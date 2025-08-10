<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;  
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = in_array($request->get('sort'), ['asc','desc']) ? $request->get('sort') : 'asc'; // Đọc tham số sort ở URL, mặc định là asc, sắp xếp từ 1 tăng dần

        $products = Product::with('category')
        ->when($request->filled('keyword'), function ($q) use ($request) {
            $kw = $request->keyword;
            $q->where(function ($qq) use ($kw) {
                $qq->where('product_name', 'like', "%{$kw}%")
                   ->orWhere('slug', 'like', "%{$kw}%");
            });
        })
        ->when($request->filled('category'), fn($q) =>
            $q->where('categories_id', $request->category))
        ->when($request->filled('status') && in_array($request->status, ['0','1'], true), fn($q) =>
            $q->where('status', (int) $request->status))
        ->orderBy('products_id', $sort) // Sắp xếp theo ID sản phẩm, tăng dần (mặc định) hoặc giảm dần (sau khi vừa create)
        ->paginate(10)
        ->withQueryString();

    $categories = Category::orderBy('sort_order')->get(['categories_id','category_name']);

    return view('admin.products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('sort_order')->get(['categories_id','category_name']);
        $brands    = config('product_specs.brands');
        $materials = config('product_specs.materials');
        $careOps   = config('product_specs.care');
        $fits      = config('product_specs.fits');

        return view('admin.products.create', compact(
        'categories','brands','materials','careOps','fits'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        // Tự gen slug nếu bỏ trống
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['product_name']);
        }

            // 1) Lấy specs từ form
        $spec = [
            'size'     => array_values((array) $request->input('spec_size', [])),
            'color'    => collect(explode(',', (string) $request->input('spec_color')))
                            ->map(fn($v) => trim($v))->filter()->unique()->values()->all(), // mảng
            'fit'      => $request->input('spec_fit'),
            'brand'    => $request->input('spec_brand'),
            'material' => $request->input('spec_material'),
            'care'     => $request->input('spec_care'),
        ];
        // 2) Phần mô tả tự do do admin nhập trong textarea "description"
        $free = (string) $request->input('description', '');

        // 3) Gộp để LƯU VÀO description theo chuẩn [SPEC]...[/SPEC] + free text
        $data['description']     = $this->buildDescriptionFromSpec($spec, $free);
        $data['specifications']  = $spec; // nếu muốn giữ thêm cột JSON chuẩn hóa

        // Upload ảnh
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index', ['sort' => 'desc']) // redirect sau khi create, gán sort = desc ở URL. Khi này sẽ redirect đúng trang vừa create
                        ->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Product $product)
    {
        $spec = is_array($product->specifications)
        ? $product->specifications
        : (json_decode($product->specifications ?? '[]', true) ?: []);

        $sizeStr = implode(', ', array_values((array)($spec['size'] ?? [])));

        // 'color' có thể là mảng hoặc chuỗi CSV
        $colorRaw = $spec['color'] ?? '';
        $colorStr = is_array($colorRaw) ? implode(', ', $colorRaw) : (string)$colorRaw;

        $data = [
            'brand'    => $spec['brand']    ?? null,
            'fit'      => $spec['fit']      ?? null,
            'material' => $spec['material'] ?? null,
            'care'     => $spec['care']     ?? null,
            'sizes'    => $sizeStr,
            'colors'   => $colorStr,
        ];

        // nếu mô tả có kèm [SPEC]...[/SPEC] thì cắt phần free text ra
        $freeDesc = (string)$product->description;
        $freeDesc = preg_replace('/\[SPEC\].*?\[\/SPEC\]\s*/s', '', $freeDesc);

        return view('admin.products.show', compact('product', 'data', 'freeDesc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('sort_order')->get(['categories_id','category_name']);

        // Lấy options từ config (đồng bộ với create)
        $brands    = config('product_specs.brands', []);
        $materials = config('product_specs.materials', []);
        $careOps   = config('product_specs.care', []);
        $fits      = config('product_specs.fits', []);

        // Parse specifications để bind vào form
        [$specFromDesc, $freeDesc] = $this->parseSpecFromDescription($product->description);
        $spec = is_array($specFromDesc) && $specFromDesc ? $specFromDesc
            : (is_array($product->specifications) ? $product->specifications : []);

        $specSize     = $spec['size']     ?? [];                    
        $specColorRaw = $spec['color'] ?? null;
        $specColorStr = is_string($specColorRaw)
            ? $specColorRaw
            : implode(', ', (array)$specColorRaw);        
        $specFit      = $spec['fit']      ?? null;
        $specBrand    = $spec['brand']    ?? null;
        $specMaterial = $spec['material'] ?? null;
        $specCare     = $spec['care']     ?? null;

        return view('admin.products.edit', compact(
            'product','categories','brands','materials','careOps','fits',
            'specSize','specColorStr','specFit','specBrand','specMaterial','specCare', 'freeDesc'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
            $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['product_name']);
        }

        // Specifications -> JSON (giống store)
            $spec = [
            'size'     => array_values((array) $request->input('spec_size', [])),
            'color'    => collect(explode(',', (string) $request->input('spec_color')))
                            ->map(fn($v) => trim($v))->filter()->unique()->values()->all(),
            'fit'      => $request->input('spec_fit'),
            'brand'    => $request->input('spec_brand'),
            'material' => $request->input('spec_material'),
            'care'     => $request->input('spec_care'),
        ];

        $free = (string) $request->input('description', '');

        $data['description']    = $this->buildDescriptionFromSpec($spec, $free);
        $data['specifications'] = $spec; // nếu muốn giữ thêm cột JSON chuẩn hóa

        // Ảnh: có file mới thì xóa file cũ
        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Product $product)
    {
        if ($product->image_path && str_starts_with($product->image_path, 'products/')) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return back()->with('success', 'Đã xóa sản phẩm (Có thể khôi phục trong Trashed).');
    }

    public function trashed(Request $request)
    {
        $products = \App\Models\Product::onlyTrashed()
            ->with('category')
            ->orderByDesc('deleted_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.trashed', compact('products'));
    }

    public function restore(\App\Models\Product $product)
    {
        $product->restore();

        return back()->with('success', 'Khôi phục sản phẩm thành công.');
    }

    // FGom Spec với Description
    private function parseSpecFromDescription(?string $desc): array
    {
        $spec = [];
        $free = trim((string)$desc);

        if (preg_match('/\[SPEC\](.*?)\[\/SPEC\]/s', (string)$desc, $m)) {
            $json = trim($m[1]);
            $decoded = json_decode($json, true);
            if (is_array($decoded)) {
                $spec = $decoded;
            }
            // bỏ block SPEC ra khỏi description -> còn lại free text
            $free = trim(preg_replace('/\[SPEC\](.*?)\[\/SPEC\]/s', '', (string)$desc));
        }

        return [$spec, $free]; // [array $spec, string $freeDescription]
    }

    private function buildDescriptionFromSpec(array $spec, string $free): string
    {
        // Lưu JSON không escape tiếng Việt cho dễ đọc/soát lỗi
        $json = json_encode($spec, JSON_UNESCAPED_UNICODE);
        return "[SPEC]{$json}[/SPEC]\n\n" . trim($free);
    }

}

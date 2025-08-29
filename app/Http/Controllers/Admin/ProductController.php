<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage; 

use Illuminate\Http\Request;  
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * @group Product
     * @authenticated
     * Display a listing of the resource.
     *
     * @queryParam q string Search by name/SKU. Example: shirt
     * @queryParam per_page integer. Example: 20
     * @responseFile storage/api-examples/products.index.json
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
     * @group Product
     * @authenticated
     * Store a newly created resource in storage.
     *
     * @bodyParam name string required. Example: Áo thun basic
     * @bodyParam sku string required. Example: TSHIRT-001
     * @bodyParam price number required. Example: 199000
     * @bodyParam active boolean. Example: true
     * @responseFile 201 storage/api-examples/products.store.json
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
        $product = Product::create($data);

        // Trường hợp form mới gửi 'images[]'
        if ($request->hasFile('images')) {
            $files = $request->file('images', []);
            $files = array_slice($files, 0, 5); // giới hạn 5

            $firstPath = null;
            foreach ($files as $idx => $f) {
                $path = $f->store('products', 'public');
                ProductImage::create([
                    'products_id' => $product->getKey(),
                    'image_path'  => $path,
                    'is_primary'  => $idx === 0,   // mặc định ảnh đầu là ảnh chính
                    'sort_order'  => $idx,
                ]);
                $firstPath ??= $path;
            }

            if ($firstPath) {
                $product->update(['image_path' => $firstPath]); // để UI cũ vẫn hiển thị
            }
        }
        // Trường hợp chỉ có field cũ 'image'
        elseif ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->update(['image_path' => $path]);

            // đồng thời push vào bảng images để data đồng nhất
            ProductImage::create([
                'products_id' => $product->getKey(),
                'image_path'  => $path,
                'is_primary'  => true,
                'sort_order'  => 0,
            ]);
        }

        return redirect()->route('admin.products.index', ['sort' => 'desc']) // redirect sau khi create, gán sort = desc ở URL. Khi này sẽ redirect đúng trang vừa create
                        ->with('success', 'Thêm sản phẩm thành công');
    }

     /**
     * @group Product
     * @authenticated
     * Display the specified resource.
     *
     * @urlParam product integer required ID. Example: 123
     * @responseFile storage/api-examples/products.show.json
     */

    public function show(\App\Models\Product $product)
    {
        $product->loadMissing('images', 'primaryImage');

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
     * @group Product
     * @authenticated
     * Update the specified resource in storage.
     *
     * @urlParam product integer required ID. Example: 123
     * @bodyParam name string. Example: Áo thun basic (mới)
     * @bodyParam price number. Example: 249000
     * @bodyParam active boolean. Example: false
     * @responseFile storage/api-examples/products.update.json
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

        // Ảnh
        if ($request->boolean('remove_image')) {
            if ($this->isLocalImagePath($product->image_path)) {
                Storage::disk('public')->delete($product->image_path); // xóa ảnh cũ nếu tick
            }
            $data['image_path'] = null;
        }

        // 1) Xóa các ảnh con theo remove_image_ids[]
        $removeIds = (array) $request->input('remove_image_ids', []);
        if (!empty($removeIds)) {
            $toDelete = $product->images()->whereIn('product_image_id', $removeIds)->get();
            foreach ($toDelete as $img) {
                if ($this->isLocalImagePath($img->image_path)) {
                    Storage::disk('public')->delete($img->image_path);
                }
                $img->delete();
            }
        }

        // 2) Upload ảnh mới từ images[] (giới hạn tổng ≤ 5)
        $currentCount = $product->images()->count();
        $canAdd = max(0, 5 - $currentCount);

        if ($request->hasFile('images') && $canAdd > 0) {
            $files = array_slice($request->file('images', []), 0, $canAdd);
            foreach ($files as $idx => $f) {
                $path = $f->store('products', 'public');
                ProductImage::create([
                    'products_id' => $product->getKey(),
                    'image_path'  => $path,
                    'is_primary'  => false,                       // sẽ set primary ở bước 4
                    'sort_order'  => $currentCount + $idx,
                ]);
                // nếu image_path đang trống, đồng bộ theo ảnh đầu vừa thêm
                if (!$product->image_path && $idx === 0) {
                    $data['image_path'] = $path;
                }
            }
        }

        // 3) Trường hợp form cũ gửi 1 file qua 'image' → thay ảnh đơn + đẩy vào bảng images
        if ($request->hasFile('image')) {
            if ($this->isLocalImagePath($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $path = $request->file('image')->store('products', 'public');
            $data['image_path'] = $path;

            // thêm vào bảng images nếu chưa đủ 5
            if ($product->images()->count() < 5) {
                ProductImage::create([
                    'products_id' => $product->getKey(),
                    'image_path'  => $path,
                    'is_primary'  => false,                       // set primary ở bước 4
                    'sort_order'  => $product->images()->count(),
                ]);
            }
        }

        // 4) Set ảnh chính theo primary_image_id (nếu có)
        $primaryId = $request->input('primary_image_id');
        if ($primaryId) {
            $owned = $product->images()->where('product_image_id', $primaryId)->exists();
            if ($owned) {
                $product->images()->update(['is_primary' => false]);
                $product->images()->where('product_image_id', $primaryId)->update(['is_primary' => true]);

                // đồng bộ image_path cho UI cũ
                $newPrimary = $product->images()->where('product_image_id', $primaryId)->first();
                if ($newPrimary) {
                    $data['image_path'] = $newPrimary->image_path;
                }
            }
        } else {
            // nếu chưa có ảnh chính → chọn ảnh đầu theo sort_order
            if (!$product->images()->where('is_primary', true)->exists()) {
                $first = $product->images()->orderBy('sort_order')->first();
                if ($first) {
                    $first->update(['is_primary' => true]);
                    $data['image_path'] = $first->image_path; // đồng bộ UI cũ
                }
            }
        }
        
        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * @group Product
     * @authenticated
     * Remove the specified resource from storage (soft delete).
     *
     * @urlParam product integer required ID. Example: 123
     * @response 204 {}
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Product $product)
    {

        if ($this->isLocalImagePath($product->image_path)) {
            \Storage::disk('public')->delete($product->image_path);
        }
        
        $product->delete();

        return back()->with('success', 'Đã đưa sản phẩm vào thùng rác (có thể khôi phục).');
    }

    /**
     * @group Product
     * @authenticated
     * Display a listing of the trashed (soft-deleted) resource.
     *
     * @responseFile storage/api-examples/products.trashed.json
     */
    public function trashed(Request $request)
    {
        $products = \App\Models\Product::onlyTrashed()
            ->with('category')
            ->orderByDesc('deleted_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.trashed', compact('products'));
    }

    /**
     * @group Product
     * @authenticated
     * Restore a soft-deleted resource.
     *
     * @urlParam product integer required ID. Example: 123
     * @responseFile storage/api-examples/products.restore.json
     */
    public function restore(\App\Models\Product $product)
    {
        $product->restore();

        return back()->with('success', 'Khôi phục sản phẩm thành công.');
    }

    private function isLocalImagePath(?string $path): bool
    {
        return !empty($path) && filter_var($path, FILTER_VALIDATE_URL) === false;
    }


    // Gom Spec với Description
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

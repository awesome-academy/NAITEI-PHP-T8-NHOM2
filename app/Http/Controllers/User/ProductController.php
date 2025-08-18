<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private const SPEC_TAG_REGEX = '/\[SPEC\](.*?)\[\/SPEC\]/s';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()
            ->active() // status = 1
            ->select(['products_id','product_name','description','product_price','image_path','created_at','slug',])
            ->latest() // created_at desc
            ->paginate(10)
            ->withQueryString();  

        return view('user.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Chặn xem sản phẩm ẩn
        abort_if(!$product->status, 404);

        // Tải kèm category
        $product->loadMissing('category');

        // Ưu tiên SPEC ở description; nếu trống dùng cột specifications
        [$specFromDesc, $freeDesc] = $this->parseSpecFromDescription($product->description);
        $spec = $specFromDesc ?: (is_array($product->specifications) ? $product->specifications : []);

        $sizes   = implode(', ', array_values((array)($spec['size'] ?? [])));
        $colors  = is_array($spec['color'] ?? null) ? implode(', ', $spec['color']) : (string)($spec['color'] ?? '');
        $fit     = $spec['fit']      ?? null;
        $brand   = $spec['brand']    ?? null;
        $material= $spec['material'] ?? null;
        $care    = $spec['care']     ?? null;

        return view('user.products.show', compact(
            'product','freeDesc','sizes','colors','fit','brand','material','care'
        ));
    }

    private function parseSpecFromDescription(?string $desc): array
    {
        $spec = [];
        $free = trim((string)$desc);

        if (preg_match(self::SPEC_TAG_REGEX, (string) $desc, $m)) {
            $json = trim($m[1]);
            $decoded = json_decode($json, true);
            if (is_array($decoded)) {
                $spec = $decoded;
            }
            $free = trim(preg_replace(self::SPEC_TAG_REGEX, '', (string) $desc));
        }

        return [$spec, $free];
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

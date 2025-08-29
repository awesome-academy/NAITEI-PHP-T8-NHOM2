<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Search products (User)
     *
     * @group Product
     * @queryParam search string Từ khóa tìm kiếm theo tên sản phẩm. Example: "iPhone"
     * @queryParam category int Lọc theo category id. Example: 1
     * @queryParam min_price int Giá tối thiểu. Example: 1000000
     * @queryParam max_price int Giá tối đa. Example: 5000000
     * @queryParam sort string Sắp xếp (price_asc, price_desc, name_asc, name_desc, latest). Example: price_asc
     * @response 200 {"data": [{"products_id": 1, "product_name": "iPhone 13", "product_price": 20000000, "image_path": "..."}]}
     */
    public function search(Request $request)
    {
        $query = Product::query()->active();
        if ($search = $request->input('search')) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }
        if ($categoryId = $request->input('category')) {
            $query->where('categories_id', $categoryId);
        }
        if ($min = $request->input('min_price')) {
            $query->where('product_price', '>=', $min);
        }
        if ($max = $request->input('max_price')) {
            $query->where('product_price', '<=', $max);
        }
        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('product_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('product_price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('product_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('product_name', 'desc');
                break;
            default:
                $query->latest();
                break;
        }
        $products = $query->paginate(10);
        return response()->json(['data' => $products->items()]);
    }
}

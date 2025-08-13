<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        // Map tên sản phẩm theo category
        $namePools = [
            'Shirts'    => ['Oxford Button-Down', 'Slim Fit Poplin', 'Casual Linen', 'Checkered Flannel', 'Classic White'],
            'T-Shirts'  => ['Basic Crewneck', 'Graphic Print', 'Oversized Cotton', 'V-Neck Essential', 'Pocket Tee'],
            'Jeans'     => ['Slim Fit Denim', 'Straight Fit', 'Tapered Indigo', 'Relaxed Fit', 'Black Stretch'],
            'Trousers'  => ['Chino Slim', 'Formal Wool', 'Stretch Cotton', 'Pleated', 'Linen Trouser'],
            'Shorts'    => ['Chino Shorts', 'Denim Shorts', 'Athletic Shorts', 'Swim Shorts', 'Cargo Shorts'],
            'Jackets'   => ['Denim Jacket', 'Bomber Jacket', 'Field Jacket', 'Windbreaker', 'Varsity Jacket'],
            'Sweaters'  => ['Merino Wool', 'Cable Knit', 'Crewneck Knit', 'Half-Zip', 'Cashmere Blend'],
            'Hoodies'   => ['Fleece Pullover', 'Zip-Up', 'Heavyweight', 'Oversized', 'Tech Hoodie'],
            'Coats'     => ['Trench Coat', 'Wool Overcoat', 'Puffer Coat', 'Peacoat', 'Rain Coat'],
            'Dresses'   => ['Shift Dress', 'Wrap Dress', 'A-Line Dress', 'Slip Dress', 'Shirt Dress'],
            'Skirts'    => ['Pleated Skirt', 'Denim Skirt', 'A-Line Skirt', 'Pencil Skirt', 'Midi Skirt'],
            'Blouses'   => ['Silk Blouse', 'Chiffon Blouse', 'Ruffle Blouse', 'Tie-Neck', 'Satin Blouse'],
            'Suits'     => ['Two-Piece Suit', 'Slim Fit Suit', 'Linen Suit', 'Wool Blend Suit', 'Pinstripe Suit'],
        ];
        
        // lấy từ config, fallback về mặc định nếu thiếu
        $brands    = config('product_specs.brands',    ['Niek','Abibas','Asecs','Old Balance','Rebike','Daidori','Pamu','Doir','Obrum','On Amour']);
        $materials = config('product_specs.materials', ['Cotton','Linen','Wool','Polyester','Cotton Blend','Denim','Cashmere Blend','Viscose']);
        $fits      = config('product_specs.fits',      ['Regular','Slim','Relaxed','Oversized']);
        $careOps   = config('product_specs.care',      ['Giặt máy nhẹ 30°C','Giặt tay với nước lạnh','Không dùng thuốc tẩy','Sấy nhẹ','Ủi nhiệt độ thấp']);
        $colors    = config('product_specs.colors',    ['Đen','Trắng','Xanh navy','Be','Ghi','Olive','Xanh dương','Nâu','Kem']);

        $sizesTop     = config('product_specs.sizes_top',     ['XS','S','M','L','XL','XXL']);
        $sizesBottom  = config('product_specs.sizes_bottom',  ['28','30','31','32','33','34','36','38']);

        // Lấy random category thực tế
        $category = Category::query()->inRandomOrder()->first(['categories_id','category_name']);
        $categoryId   = $category?->categories_id ?? 1;
        $categoryName = $category?->category_name ?? 'Shirts';

        // name/thuộc tính
        $brand   = $this->faker->randomElement($brands);
        $base    = $this->faker->randomElement($namePools[$categoryName] ?? ['Essential Apparel']);
        $colorArr = (array) Arr::random($colors, $this->faker->numberBetween(1, 3));
        $material= $this->faker->randomElement($materials);
        $fit     = $this->faker->randomElement($fits);
        $sizePool = in_array($categoryName, ['Jeans','Trousers','Shorts','Skirts'])
            ? $sizesBottom
            : $sizesTop;
        $sizeArr  = (array) Arr::random($sizePool, $this->faker->numberBetween(1, 3));
        $careOne = $this->faker->randomElement($careOps);

        // giá theo category
        $price = match ($categoryName) {
            'Shirts','T-Shirts','Shorts','Skirts','Blouses','Hoodies','Sweaters' => $this->faker->randomFloat(2, 150000, 1200000),
            'Jeans','Trousers'                                                   => $this->faker->randomFloat(2, 350000, 1800000),
            'Jackets','Coats','Suits','Dresses'                                  => $this->faker->randomFloat(2, 700000, 4500000),
            default                                                              => $this->faker->randomFloat(2, 200000, 2000000),
        };

        // Name & slug
        $colorForName = is_array($colorArr) ? $colorArr[0] : $colorArr;
        $name = "{$brand} {$base} - {$colorForName}";

        // Specs
        $spec = [
        'size'     => array_values($sizeArr),
        'color'    => array_values($colorArr),
        'fit'      => $fit,
        'brand'    => $brand,
        'material' => $material,
        'care'     => $careOne,
        ];

        // Description
        $useCases = ['đi làm', 'đi học', 'đi phượt', 'du lịch', 'ở nhà', 'cà phê tám chuyện'];
        $fabricFeel = ['mềm mịn', 'thoáng mát', 'ấm áp', 'co giãn', 'ít nhăn'];

        $sizeForDesc = implode('/', array_values($sizeArr)); // hoặc $sizeArr[0] ?? 'Free'

        // mô tả tự do + thuộc tính đã chọn
        $descFree = sprintf(
            '%s %s màu %s, chất liệu %s, phom %s, size %s. Thiết kế tối giản, dễ phối đồ, phù hợp %s. Bề mặt vải %s, mang lại cảm giác thoải mái khi mặc. Hướng dẫn bảo quản: %s.',
            $brand, $base, mb_strtolower($colorForName), $material, $fit, $sizeForDesc,
            $this->faker->randomElement($useCases),
            $this->faker->randomElement($fabricFeel),
            $careOne
        );

        // Description = [SPEC]{json}[/SPEC] + free text
        $description = "[SPEC]".json_encode($spec, JSON_UNESCAPED_UNICODE)."[/SPEC]\n\n".$descFree;

        return [
            'categories_id'  => $categoryId,
            'product_name'   => $name,
            'slug'           => Str::slug($name) . '-' . Str::random(5),
            'description'    => $description,
            'product_price'  => $price,
            'stock_quantity' => $this->faker->numberBetween(0, 120),
            'status'         => $this->faker->boolean(75) ? 1 : 0,
            // Lưu tạm đường placeholder, sau này sẽ thay bằng ảnh thật
            'image_path'     => 'https://via.placeholder.com/800x1000.png?text=' . urlencode($name),
            //Cập nhật thông tin trong json
            'specifications' => json_encode($spec, JSON_UNESCAPED_UNICODE),
        ];
    }
}

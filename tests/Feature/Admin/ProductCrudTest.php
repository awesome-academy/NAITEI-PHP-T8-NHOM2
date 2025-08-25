<?php

namespace Tests\Feature\Admin;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // helper: đăng nhập admin qua AdminMiddleware 
    private function actingAsAdmin(): User
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        return $admin;
    }

    // helper: tạo 1 category phù hợp migration hiện có
    private function makeCategory(): Category
    {
        return Category::create([
            'category_name' => 'T-Shirts',
            'slug'          => 't-shirts',
            'description'   => 'Áo thun',
            'sort_order'    => 1,
        ]);
    }

    // helper: payload hợp lệ theo StoreProductRequest + config/product_specs.php 
    private function validPayload(Category $category, array $overrides = []): array
    {
        $base = [
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo thun Unisex',
            'product_price'  => '199000',   // SQLite giữ decimal(8,2) => OK
            'stock_quantity' => 10,
            'status'         => 1,
            // specs đúng với config
            'spec_size'      => ['S','M'],
            'spec_color'     => 'Đen, Trắng',
            'spec_fit'       => 'Regular',
            'spec_brand'     => 'Niek',
            'spec_material'  => 'Cotton',
            'spec_care'      => 'Giặt máy nhẹ 30°C',
            'description'    => 'Mô tả tự do',
            // ko gửi slug -> prepareForValidation() tự gen
        ];
        return array_replace($base, $overrides);
    }

    // helper: tạo ảnh 1x1 PNG để test
    private function tinyPng(): UploadedFile
    {
        $png1x1 = base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+3uE8AAAAASUVORK5CYII='
        );
        return UploadedFile::fake()->createWithContent('sp.png', $png1x1);
    }

    // helper: tạo 1 sản phẩm với category đã có
    private function makeProduct(Category $category, array $overrides = []): Product
    {
        $name = $overrides['product_name'] ?? 'Sản phẩm '.Str::random(4);
        return Product::create(array_replace([
            'categories_id'  => $category->categories_id,
            'product_name'   => $name,
            'description'    => '[SPEC]{}[/SPEC]',
            'product_price'  => '100000',
            'stock_quantity' => 5,
            'image_path'     => null,
            'specifications' => [],
            'slug'           => Str::slug($name),
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ], $overrides));
    }

    /** @test */
    // Kiểm tra admin có thể tạo sản phẩm với ảnh và slug tự động - C
    public function admin_can_store_product_with_image_and_auto_slug(): void
    {
        // 1. giả lập disk công khai để lưu ảnh
        Storage::fake('public');

        // 2. đăng nhập admin
        $this->actingAsAdmin();
        $category = $this->makeCategory();

        // 3. gửi request tạo sản phẩm với ảnh
        // tạo 1x1 PNG để test
        $png1x1 = base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+3uE8AAAAASUVORK5CYII='
        );
        $imageFake = UploadedFile::fake()->createWithContent('sp.png', $png1x1);

        $payload = $this->validPayload($category, [
            'image' => $imageFake,
        ]);

        $res = $this->post(route('admin.products.store'), $payload);

        // 4. kỳ vọng redirect về index?sort=desc, đúng theo controller
        $res->assertRedirect(route('admin.products.index', ['sort' => 'desc']));

        // 5. lấy sản phẩm vừa tạo và assert dữ liệu
        $product = Product::query()->latest('products_id')->first();
        $this->assertNotNull($product, 'Không tìm thấy sản phẩm sau khi store');

        // test DB có bản ghi
        $this->assertDatabaseHas('products', [
            'products_id'   => $product->products_id,
            'categories_id' => $category->categories_id,
            'product_name'  => 'Áo thun Unisex',
            'status'        => 1,
        ]);

        // test ảnh đã được lưu vào disk giả lập
        Storage::disk('public')->assertExists($product->image_path);

        // test slug được gen tự động trong prepareForValidation()
        $this->assertEquals(Str::slug('Áo thun Unisex'), $product->slug);

        // test description có block [SPEC]...[/SPEC]
        $this->assertStringContainsString('[SPEC]', (string) $product->description);
    }

    /** @test */
    // Kiểm tra admin có thể cập nhật sản phẩm và xóa ảnh cũ nếu cần - U
    public function admin_can_update_product_and_remove_image(): void
    {
        // 1. giả lập disk
        Storage::fake('public');

        // 2. login admin + category + 1 product có ảnh local
        $this->actingAsAdmin();
        $category = $this->makeCategory();

        // tạo file ảnh cũ
        $oldPath = 'products/old.png';
        Storage::disk('public')->put($oldPath, 'old-image');

        // tạo product trực tiếp (không phụ thuộc factory)
        $product = Product::create([
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo cũ',
            'description'    => '[SPEC]{}[/SPEC]',
            'product_price'  => '120000',
            'stock_quantity' => 5,
            'image_path'     => $oldPath,            // local → sẽ bị xóa
            'specifications' => [],
            'slug'           => 'ao-cu',
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ]);

        // 3. payload update: yêu cầu xóa ảnh cũ, KHÔNG upload ảnh mới
        $newName = 'Áo thun bản mới';
        $payload = $this->validPayload($category, [
            'product_name' => $newName,
            'remove_image' => 1,
            // Ko gửi 'image'
        ]);

        $res = $this->patch(
            route('admin.products.update', ['product' => $product->getKey()]),
            $payload
        );

        // 4. redirect đúng
        $res->assertRedirect(route('admin.products.index'));

        // 5 ảnh cũ bị xóa + DB cập nhật
        Storage::disk('public')->assertMissing($oldPath);

        $product->refresh();
        $this->assertNull($product->image_path);
        $this->assertEquals(Str::slug($newName), $product->slug);
        $this->assertStringContainsString('[SPEC]', (string) $product->description);
    }

    /** @test */
    // Kiểm tra admin có thể cập nhật sản phẩm và thay thế ảnh cũ - U
    public function admin_can_update_product_and_replace_image(): void
    {
        Storage::fake('public');

        $this->actingAsAdmin();
        $category = $this->makeCategory();

        // Tạo ảnh cũ
        $oldPath = 'products/old2.png';
        Storage::disk('public')->put($oldPath, 'old-image-2');

        $product = Product::create([
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo cũ 2',
            'description'    => '[SPEC]{}[/SPEC]',
            'product_price'  => '150000',
            'stock_quantity' => 7,
            'image_path'     => $oldPath,            // local → sẽ bị xóa khi update
            'specifications' => [],
            'slug'           => 'ao-cu-2',
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ]);

        // payload có ảnh mới + spec mới
        $newName = 'Áo thun thay ảnh';
        $payload = $this->validPayload($category, [
            'product_name'  => $newName,
            'image'         => $this->tinyPng(),
            // đổi specs để kiểm chứng
            'spec_size'     => ['L','XL'],
            'spec_color'    => 'Đen, Trắng',
            'spec_fit'      => 'Slim',
            'spec_brand'    => 'Niek',
            'spec_material' => 'Cotton',
            'spec_care'     => 'Sấy nhẹ',
        ]);

        $res = $this->patch(
            route('admin.products.update', ['product' => $product->getKey()]),
            $payload
        );

        $res->assertRedirect(route('admin.products.index'));

        $product->refresh();

        // ảnh cũ bị xóa, ảnh mới tồn tại
        Storage::disk('public')->assertMissing($oldPath);
        $this->assertNotNull($product->image_path);
        Storage::disk('public')->assertExists($product->image_path);

        // slug & description/specifications cập nhật
        $this->assertEquals(Str::slug($newName), $product->slug);
        $this->assertStringContainsString('[SPEC]', (string) $product->description);

        // specifications được cast thành array — kiểm tra vài field quan trọng
        $spec = (array) $product->specifications;
        $this->assertSame(['Đen','Trắng'], array_values($spec['color'] ?? []));
        $this->assertSame(['L','XL'], array_values($spec['size'] ?? []));
        $this->assertEquals('Slim', $spec['fit'] ?? null);
    }

    /** @test */
    // Kiểm tra admin có thể xóa sản phẩm và xóa ảnh local nếu có - D
    public function admin_can_soft_delete_product_and_remove_local_image(): void
    {
        Storage::fake('public');

        $this->actingAsAdmin();
        $category = $this->makeCategory();

        // ảnh local để verify controller có xóa
        $oldPath = 'products/for-delete.png';
        Storage::disk('public')->put($oldPath, 'old-image');

        // tạo product với ảnh local để test xóa
        $product = Product::create([
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo xóa',
            'description'    => '[SPEC]{}[/SPEC]',
            'product_price'  => '100000',
            'stock_quantity' => 3,
            'image_path'     => $oldPath,   // local path
            'specifications' => [],
            'slug'           => 'ao-xoa',
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ]);

        // đặt referer để back() redirect đúng
        $res = $this->from(route('admin.products.index'))
            ->delete(route('admin.products.destroy', ['product' => $product->getKey()]));

        // redirect về index + flash message
        $res->assertRedirect(route('admin.products.index'));
        $res->assertSessionHas('success');

        // ánh cũ bị xóa
        Storage::disk('public')->assertMissing($oldPath);

        // soft deleted
        $this->assertSoftDeleted('products', ['products_id' => $product->getKey()]);
    }

    /** @test */
    // Kiểm tra admin có thể xem trang trashed và thấy các sản phẩm đã soft deleted - Restore
    public function admin_can_view_trashed_products_page_shows_soft_deleted_items(): void
    {
        $this->actingAsAdmin();
        $category = $this->makeCategory();

        // tạo 1 product rồi soft delete
        $product = Product::create([
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo đã xoá',
            'description'    => '[SPEC]{}[/SPEC]',
            'product_price'  => '120000',
            'stock_quantity' => 2,
            'image_path'     => null,
            'specifications' => [],
            'slug'           => 'ao-da-xoa',
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ]);
        $product->delete(); // soft delete

        // truy cập trang trashed
        $res = $this->get(route('admin.products.trashed'));

        $res->assertOk();
        // trang thường hiển thị tên sản phẩm — kiểm tra có chuỗi đó
        $res->assertSee('Áo đã xoá');
    }

    /** @test */
    // Kiểm tra admin có thể khôi phục sản phẩm đã soft deleted - Restore
    public function admin_can_restore_a_soft_deleted_product(): void
    {
        $this->actingAsAdmin();
        $category = $this->makeCategory();

        $product = Product::create([
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo phục hồi',
            'description'    => '[SPEC]{}[/SPEC]',
            'product_price'  => '150000',
            'stock_quantity' => 5,
            'image_path'     => null,
            'specifications' => [],
            'slug'           => 'ao-phuc-hoi',
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ]);
        $product->delete(); // soft delete

        // gọi route restore (POST) và đặt referer là trang trashed
        $res = $this->from(route('admin.products.trashed'))
            ->post(route('admin.products.restore', ['product' => $product->getKey()]));

        // controller trả back()->with('success'...)
        $res->assertRedirect(route('admin.products.trashed'));
        $res->assertSessionHas('success');

        // không còn soft-deleted nữa
        $this->assertNotSoftDeleted('products', ['products_id' => $product->getKey()]);
    }

    /** @test */
    // Kiểm tra admin có thể tìm kiếm sản phẩm theo tên hoặc slug - Search - R
    public function index_filters_by_keyword_matches_name_or_slug(): void
    {
        $this->actingAsAdmin();
        $cat = $this->makeCategory();

        $p1 = $this->makeProduct($cat, ['product_name' => 'Áo thun Galaxy', 'slug' => 'ao-thun-galaxy']);
        $p2 = $this->makeProduct($cat, ['product_name' => 'Quần jeans Stone', 'slug' => 'quan-jeans-stone']);
        $p3 = $this->makeProduct($cat, ['product_name' => 'Áo khoác gió',     'slug' => 'ao-khoac-gio']);

        $res = $this->get(route('admin.products.index', ['keyword' => 'jeans']));

        $res->assertOk();
        $res->assertSee('Quần jeans Stone');
        $res->assertDontSee('Áo thun Galaxy');
        $res->assertDontSee('Áo khoác gió');
    }

    /** @test */
    // Kiểm tra admin có thể lọc sản phẩm theo category - Filter by Category - R
    public function index_filters_by_category_id(): void
    {
        $this->actingAsAdmin();

        $catTs = Category::create([
            'category_name' => 'T-Shirts', 'slug' => 't-shirts', 'description' => 'Áo thun', 'sort_order' => 1,
        ]);
        $catJeans = Category::create([
            'category_name' => 'Jeans', 'slug' => 'jeans', 'description' => 'Quần jeans', 'sort_order' => 2,
        ]);

        $pTs    = $this->makeProduct($catTs,    ['product_name' => 'Áo thun A']);
        $pJeans = $this->makeProduct($catJeans, ['product_name' => 'Quần jeans B']);

        $res = $this->get(route('admin.products.index', ['category' => $catJeans->categories_id]));

        $res->assertOk();
        $res->assertSee('Quần jeans B');
        $res->assertDontSee('Áo thun A');
    }

    /** @test */
    // Kiểm tra admin có thể lọc sản phẩm theo trạng thái - Filter by Status - R
    public function index_filters_by_status_and_sorts_by_id_desc(): void
    {
        $this->actingAsAdmin();
        $cat = $this->makeCategory();

        // tạo 3 SP theo thứ tự ID tăng dần
        $p1 = $this->makeProduct($cat, ['product_name' => 'SP 1', 'status' => 1]);
        $p2 = $this->makeProduct($cat, ['product_name' => 'SP 2', 'status' => 0]); // sẽ bị lọc
        $p3 = $this->makeProduct($cat, ['product_name' => 'SP 3', 'status' => 1]);

        $res = $this->get(route('admin.products.index', ['status' => '1', 'sort' => 'desc']));
        $res->assertOk();

        // lấy paginator từ view & kiểm tra thứ tự ID đúng desc
        $products = $res->viewData('products');
        $this->assertNotNull($products, 'View không có biến products');

        $ids = array_map(fn ($it) => $it->products_id, $products->items());

        // chỉ còn sp3 và sp1 (status=1) và đúng thứ tự desc theo id
        $this->assertSame([$p3->products_id, $p1->products_id], $ids);

        // ko có sản phẩm status=0 trong trang
        $this->assertTrue(collect($products->items())->every(fn ($it) => (int)$it->status === 1));

        // UI không hiện sp2
        $res->assertDontSee('SP 2');
    }

    /** @test */
    // Kiểm tra admin có thể xem trang chi tiết sản phẩm - Show
    public function admin_can_view_product_detail_show_page(): void
    {
        $this->actingAsAdmin();
        $category = $this->makeCategory();

        // spec & description theo đúng format controller
        $spec = [
            'size'     => ['S', 'M'],
            'color'    => ['Đen', 'Trắng'],
            'fit'      => 'Regular',
            'brand'    => 'Niek',
            'material' => 'Cotton',
            'care'     => 'Giặt máy nhẹ 30°C',
        ];
        $free = 'Đây là mô tả tự do cho sản phẩm.';

        $product = Product::create([
            'categories_id'  => $category->categories_id,
            'product_name'   => 'Áo thun Show',
            'description'    => '[SPEC]'.json_encode($spec, JSON_UNESCAPED_UNICODE).'[/SPEC]'."\n\n".$free,
            'product_price'  => '199000',
            'stock_quantity' => 10,
            'image_path'     => null,
            'specifications' => $spec, // controller dùng specifications để build data
            'slug'           => Str::slug('Áo thun Show'),
            'status'         => 1,
            'rating_count'   => 0,
            'rating_avg'     => 0,
        ]);

        $res = $this->get(route('admin.products.show', ['product' => $product->getKey()]));
        $res->assertOk();

        // Kiểm tra biến view
        $res->assertViewHas('product', fn ($p) => $p->products_id === $product->products_id);
        $res->assertViewHas('data', function ($data) {
            return ($data['brand'] ?? null) === 'Niek'
                && ($data['fit'] ?? null) === 'Regular'
                && ($data['material'] ?? null) === 'Cotton'
                && ($data['care'] ?? null) === 'Giặt máy nhẹ 30°C'
                && ($data['sizes'] ?? null) === 'S, M'
                && ($data['colors'] ?? null) === 'Đen, Trắng';
        });
        $res->assertViewHas('freeDesc', fn ($d) => str_contains($d, 'Đây là mô tả tự do'));

        // HTML có hiển thị tên SP hoặc một phần freeDesc
        $res->assertSee('Áo thun Show');
        $res->assertSee('Đây là mô tả tự do');
    }

}

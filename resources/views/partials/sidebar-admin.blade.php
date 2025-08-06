<aside class="w-64 bg-white border-r min-h-screen p-6">
  <h2 class="text-lg font-semibold mb-6">Admin Panel</h2>
  <ul class="space-y-4">
    {{-- Dashboard giờ trỏ tới test-admin --}}
    <li>
      <a href="{{ route('test.admin') }}"
         class="text-gray-700 hover:text-gray-900">
        Dashboard
      </a>
    </li>

    {{-- Những mục khác tạm ẩn cho đến khi bạn tạo route thật --}}
    {{-- 
    <li>
      <a href="{{ route('admin.categories.index') }}"
         class="text-gray-700 hover:text-gray-900">
        Danh mục
      </a>
    </li>
    <li>
      <a href="{{ route('admin.products.index') }}"
         class="text-gray-700 hover:text-gray-900">
        Sản phẩm
      </a>
    </li>
    <li>
      <a href="{{ route('admin.orders.index') }}"
         class="text-gray-700 hover:text-gray-900">
        Đơn hàng
      </a>
    </li>
    <li>
      <a href="{{ route('admin.users.index') }}"
         class="text-gray-700 hover:text-gray-900">
        Người dùng
      </a>
    </li>
    --}}
  </ul>
</aside>

<x-user-layout>
  <x-slot name="header">
    <nav class="text-sm text-gray-500">
      <a href="{{ route('user.products.index') }}" class="hover:text-gray-800">Sản phẩm</a>
      <span class="mx-2">/</span>
      <span class="text-gray-900">{{ $product->product_name }}</span>
    </nav>
  </x-slot>


  <div id="product-show" class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-12 gap-8">

      {{-- LEFT: image --}}
      <div class="col-span-5 flex justify-center md:justify-start">
        <div class="bg-white rounded-2xl shadow-sm p-3">
          <img
            src="{{ $product->image_url }}"
            alt="{{ $product->product_name }}"
            class="block w-full h-auto object-contain max-w-[520px] max-h-[560px] rounded-xl"
            loading="lazy"
          >
        </div>
      </div>

      {{-- RIGHT: info + actions --}}
      <div class="col-span-7">
        <h1 class="text-2xl md:text-3xl font-semibold text-gray-900">
          {{ $product->product_name }}
        </h1>

        <div class="mt-3 flex items-baseline gap-3">
          <div class="text-2xl font-bold text-gray-900">
            {{ number_format((float)$product->product_price, 0, ',', '.') }} đ
          </div>
          @if($product->stock_quantity > 0)
            <span class="text-sm text-green-600">Còn {{ $product->stock_quantity }} sp</span>
          @else
            <span class="text-sm text-red-600">Hết hàng</span>
          @endif
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-sm">
          <div>Danh mục: <span class="font-medium">{{ $product->category?->category_name }}</span></div>
          @if(!empty($brand))    <div>Brand:    <span class="font-medium">{{ $brand }}</span></div>@endif
          @if(!empty($fit))      <div>Phom:     <span class="font-medium">{{ $fit }}</span></div>@endif
          @if(!empty($material)) <div>Chất liệu: <span class="font-medium">{{ $material }}</span></div>@endif
          @if(!empty($sizes))    <div>Size:     <span class="font-medium">{{ $sizes }}</span></div>@endif
          @if(!empty($colors))   <div>Màu:      <span class="font-medium">{{ $colors }}</span></div>@endif
        </div>

        @if(!empty($freeDesc))
          <div class="mt-6 prose max-w-none text-gray-700">
            {!! nl2br(e($freeDesc)) !!}
          </div>
        @endif

        {{-- Quantity + buttons --}}
        <div class="mt-8">
          <label class="block text-sm mb-1 text-gray-700">Số lượng</label>
          <div class="flex items-center gap-3">
            <div class="flex items-center border rounded-lg overflow-hidden">
              <button id="qty-minus" type="button" class="px-3 py-2 hover:bg-gray-50">−</button>
                <input id="qty-input" type="number" min="1" value="1"
                  class="no-spinner w-16 text-center border-x py-2 focus:outline-none">
              <button id="qty-plus" type="button" class="px-3 py-2 hover:bg-gray-50">+</button>
            </div>

            @auth
              <a id="btn-add"
                 href="{{ route('cart.add', ['id' => $product->products_id, 'qty' => 1, 'redirect' => 'cart']) }}"
                 class="inline-flex items-center px-5 py-3 rounded-xl border border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white">
                Thêm vào giỏ
              </a>

              <a id="btn-buy"
                 href="{{ route('cart.add', ['id' => $product->products_id, 'qty' => 1, 'redirect' => 'checkout']) }}"
                 class="inline-flex items-center px-5 py-3 rounded-xl border border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white">
                Mua ngay
              </a>
            @else
              <a href="{{ route('login') }}"
                 class="inline-flex items-center px-5 py-3 rounded-xl bg-gray-900 text-white hover:bg-gray-800">
                Đăng nhập để mua
              </a>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Đồng bộ qty -> URL --}}
  <script>
    (function () {
      const minus = document.getElementById('qty-minus');
      const plus  = document.getElementById('qty-plus');
      const input = document.getElementById('qty-input');
      const btnAdd = document.getElementById('btn-add');
      const btnBuy = document.getElementById('btn-buy');

      function clamp(v) {
        v = parseInt(v || 1, 10);
        if (isNaN(v) || v < 1) {
          return 1;
        }
        return v;
      }
      
      function updateLinks(){
        if (!btnAdd) return;
        const addUrl = new URL(btnAdd.href);
        addUrl.searchParams.set('qty', clamp(input.value));
        btnAdd.href = addUrl.toString();

        if (btnBuy){
          const buyUrl = new URL(btnBuy.href);
          buyUrl.searchParams.set('qty', clamp(input.value));
          btnBuy.href = buyUrl.toString();
        }
      }
      minus?.addEventListener('click', ()=>{ input.value = Math.max(1, clamp(input.value)-1); updateLinks(); });
      plus ?.addEventListener('click', ()=>{ input.value = clamp(input.value)+1; updateLinks(); });
      input?.addEventListener('input', updateLinks);
      updateLinks();
    })();
  </script>
</x-user-layout>

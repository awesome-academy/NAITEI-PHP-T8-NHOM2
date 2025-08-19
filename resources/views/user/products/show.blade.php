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
      {{-- ========== FEEDBACKS ========== --}}
        <hr class="my-10">

        <section id="feedbacks" class="space-y-6">
          {{-- Tổng quan rating + filter --}}
          <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div class="flex items-center gap-4">
              <x-star-rating :value="$product->rating_avg" :size="4" />
              <div class="text-sm text-gray-600">
                <div><strong>{{ $product->rating_count }}</strong> lượt đánh giá</div>
                <div class="flex flex-wrap items-center gap-2 mt-2">
                  @for($s=5;$s>=1;$s--)
                    @php $cnt = (int) ($breakdown[$s] ?? 0); @endphp
                    <a href="{{ route('user.products.show', ['product'=>$product->slug, 'stars'=>$s]) }}"
                      class="text-xs px-2 py-1 rounded border {{ (int)request('stars')===$s ? 'bg-yellow-100 border-yellow-300' : 'bg-gray-50 border-gray-200' }}">
                      {{ $s }}★ ({{ $cnt }})
                    </a>
                  @endfor
                  <a href="{{ route('user.products.show', ['product'=>$product->slug]) }}"
                    class="text-xs px-2 py-1 rounded border {{ request('stars') ? 'bg-gray-50 border-gray-200' : 'bg-yellow-100 border-yellow-300' }}">
                    Tất cả
                  </a>
                </div>
              </div>
            </div>

            {{-- Flash messages --}}
            <div class="text-right">
              @if (session('success'))
                <div class="text-green-600 text-sm">{{ session('success') }}</div>
              @endif
              @if (session('error'))
                <div class="text-red-600 text-sm">{{ session('error') }}</div>
              @endif
            </div>
          </div>

          {{-- Form tạo/sửa feedback --}}
          <div class="bg-white p-4 rounded-xl shadow">
            @auth
              @if ($canReview)
                <h3 class="font-semibold mb-2">Viết đánh giá của bạn</h3>
                <form method="POST" action="{{ route('user.products.feedbacks.store', $product->slug) }}" class="space-y-3">
                  @csrf
                  <div>
                    <label class="text-sm">Số sao</label>
                    <input type="number" name="rating" min="1" max="5" value="5" class="border rounded p-2 w-24">
                    @error('rating') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                  </div>
                  <div>
                    <label class="text-sm">Nhận xét (≤100 ký tự)</label>
                    <input type="text" name="comment" maxlength="100" class="border rounded p-2 w-full" placeholder="Ví dụ: Hàng ổn áp">
                    @error('comment') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                  </div>
                  <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">Gửi đánh giá</button>
                </form>
              @elseif ($userFeedback)
                <h3 class="font-semibold mb-2">Đánh giá của bạn</h3>
                <div class="border rounded p-3 mb-3">
                  <div class="flex items-center justify-between">
                    <x-star-rating :value="$userFeedback->rating" :size="3" />
                    <span class="text-xs text-gray-500">Đã mua hàng</span>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">{{ $userFeedback->comment }}</p>
                </div>

                {{-- Sửa --}}
                <details class="mb-2">
                  <summary class="cursor-pointer text-sm text-blue-600">Sửa đánh giá</summary>
                  <form method="POST" action="{{ route('user.products.feedbacks.update', [$product->slug, $userFeedback->getKey()]) }}" class="space-y-3 mt-3">
                    @csrf @method('PATCH')
                    <div>
                      <label class="text-sm">Số sao</label>
                      <input type="number" name="rating" min="1" max="5" value="{{ $userFeedback->rating }}" class="border rounded p-2 w-24">
                      @error('rating') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                      <label class="text-sm">Nhận xét (≤100 ký tự)</label>
                      <input type="text" name="comment" maxlength="100" value="{{ $userFeedback->comment }}" class="border rounded p-2 w-full">
                      @error('comment') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">Cập nhật</button>
                  </form>
                </details>

                {{-- Xoá --}}
                <form method="POST" action="{{ route('user.products.feedbacks.destroy', [$product->slug, $userFeedback->getKey()]) }}"
                      onsubmit="return confirm('Xoá đánh giá?')" class="inline">
                  @csrf @method('DELETE')
                  <button class="px-3 py-2 bg-red-600 text-white rounded-lg text-sm">Xoá đánh giá</button>
                </form>
              @else
                @if(!$hasCompletedOrder)
                  <p class="text-sm text-gray-600">Bạn cần mua sản phẩm (đơn đã hoàn tất) để viết đánh giá.</p>
                @endif
              @endif
            @else
              <p class="text-sm text-gray-600">Vui lòng <a class="text-blue-600 underline" href="{{ route('login') }}">đăng nhập</a> để viết đánh giá.</p>
            @endauth
          </div>

          {{-- Danh sách feedback --}}
          <div class="space-y-3">
            @forelse ($reviews as $rv)
              <article class="bg-white p-4 rounded-xl shadow">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="text-sm font-medium">{{ $rv->user->name ?? 'Người dùng' }}</div>
                    <span class="text-xs text-gray-500">{{ $rv->created_at->diffForHumans() }}</span>
                  </div>
                  @if($rv->verified_purchase)
                    <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-700">Đã mua hàng</span>
                  @endif
                </div>
                <div class="mt-2"><x-star-rating :value="$rv->rating" :size="3" /></div>
                <p class="mt-2 text-sm text-gray-700">{{ $rv->comment }}</p>
              </article>
            @empty
              <p class="text-sm text-gray-600">Chưa có đánh giá nào.</p>
            @endforelse
          </div>

          <div class="mt-4">
            {{ $reviews->links() }}
          </div>
        </section>
        {{-- ========== /FEEDBACKS ========== --}}
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

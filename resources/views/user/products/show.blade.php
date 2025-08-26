<x-user-layout>
  <x-slot name="header">
    <nav class="text-sm text-gray-500">
      <a href="{{ route('user.products.index') }}" class="hover:text-gray-800">{{ __('products.products') }}</a>
      <span class="mx-2">/</span>
      <span class="text-gray-900">{{ $product->product_name }}</span>
    </nav>
  </x-slot>


  <div id="product-show" class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-12 gap-8">

      {{-- LEFT: image --}}
      <div class="col-span-5 flex justify-center md:justify-start">
        @php
          $gallery = $product->images;
          $primary = $gallery->firstWhere('is_primary', true) ?? $gallery->first();
          $mainUrl = $primary?->url ?? $product->image_url;
        @endphp

        <div id="user-gallery" class="bg-white rounded-2xl shadow-sm p-3 space-y-3">
          {{-- ảnh lớn --}}
          <div class="rounded-xl border overflow-hidden">
            <img id="user-gallery-main"
                src="{{ $mainUrl }}"
                alt="{{ $product->product_name }}"
                class="block w-full h-auto object-contain max-w-[520px] max-h-[560px]">
          </div>

          {{-- thumbnails --}}
          <div class="flex gap-3 overflow-x-auto">
            @forelse($gallery as $img)
              <button type="button"
                      class="h-20 w-20 border rounded-xl overflow-hidden focus:ring-2 focus:ring-gray-300 {{ $img->is_primary ? 'ring-2 ring-gray-400' : '' }}"
                      data-src="{{ $img->url }}">
                <img src="{{ $img->url }}" class="h-full w-full object-cover" alt="">
              </button>
            @empty
              <img src="{{ $product->image_url }}" class="h-20 w-20 border rounded-xl object-cover" alt="">
            @endforelse
          </div>
        </div>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const main = document.getElementById('user-gallery-main');
            document.querySelectorAll('#user-gallery [data-src]').forEach(btn => {
              btn.addEventListener('click', () => { main.src = btn.dataset.src; });
            });
          });
        </script>
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
            <span class="text-sm text-green-600">{{ __('products.stock_left', ['count' => $product->stock_quantity]) }}</span>
          @else
            <span class="text-sm text-red-600">{{ __('products.unavailable') }}</span>
          @endif
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-sm">
          <div>{{ __('products.category') }}: <span class="font-medium">{{ $product->category?->category_name }}</span></div>
          @if(!empty($brand))    <div>Brand:    <span class="font-medium">{{ $brand }}</span></div>@endif
          @if(!empty($fit))      <div>Phom:     <span class="font-medium">{{ $fit }}</span></div>@endif
          @if(!empty($material)) <div>Chất liệu: <span class="font-medium">{{ $material }}</span></div>@endif
          @if(!empty($sizes))    <div>{{ __('products.size') }}:     <span class="font-medium">{{ $sizes }}</span></div>@endif
          @if(!empty($colors))   <div>{{ __('products.color') }}:      <span class="font-medium">{{ $colors }}</span></div>@endif
        </div>

        @if(!empty($freeDesc))
          <div class="mt-6 prose max-w-none text-gray-700">
            {!! nl2br(e($freeDesc)) !!}
          </div>
        @endif

        {{-- Quantity + buttons --}}
        <div class="mt-8">
            @if($product->stock_quantity > 0)
                <label class="block text-sm mb-1 text-gray-700">{{ __('products.quantity') }}</label>
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
                            {{ __('products.add_to_cart') }}
                        </a>

                        <a id="btn-buy"
                           href="{{ route('cart.add', ['id' => $product->products_id, 'qty' => 1, 'redirect' => 'checkout']) }}"
                           class="inline-flex items-center px-5 py-3 rounded-xl border border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white">
                            {{ __('products.buy_now') }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center px-5 py-3 rounded-xl bg-gray-900 text-white hover:bg-gray-800">
                            {{ __('products.login_to_buy') }}
                        </a>
                    @endauth
                </div>
            @else
                <div class="mt-8">
                    <span class="px-5 py-3 rounded-xl border bg-gray-200 text-gray-500">
                        {{ __('common.out_of_stock') }}
                    </span>
                </div>
            @endif
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
                <div><strong>{{ $product->rating_count }}</strong> {{ __('products.reviews_count', ['count' => $product->rating_count]) }}</div>
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
                    {{ __('products.all') }}
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
                <h3 class="font-semibold mb-2">{{ __('products.write_your_review') }}</h3>
                <form method="POST" action="{{ route('user.products.feedbacks.store', $product->slug) }}" class="space-y-3">
                  @csrf
                  <div>
                    <label class="text-sm">{{ __('products.rating') }}</label>
                    <input type="number" name="rating" min="1" max="5" value="5" class="border rounded p-2 w-24">
                    @error('rating') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                  </div>
                  <div>
                    <label class="text-sm">{{ __('products.comment_max_chars') }}</label>
                    <input type="text" name="comment" maxlength="100" class="border rounded p-2 w-full" placeholder="{{ __('products.comment_placeholder') }}">
                    @error('comment') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                  </div>
                  <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">{{ __('products.submit_review') }}</button>
                </form>
              @elseif ($userFeedback)
                <h3 class="font-semibold mb-2">{{ __('products.your_review') }}</h3>
                <div class="border rounded p-3 mb-3">
                  <div class="flex items-center justify-between">
                    <x-star-rating :value="$userFeedback->rating" :size="3" />
                    <span class="text-xs text-gray-500">{{ __('products.verified_purchase') }}</span>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">{{ $userFeedback->comment }}</p>
                </div>

                {{-- Sửa --}}
                <details class="mb-2">
                  <summary class="cursor-pointer text-sm text-blue-600">{{ __('products.edit_review') }}</summary>
                  <form method="POST" action="{{ route('user.products.feedbacks.update', [$product->slug, $userFeedback->getKey()]) }}" class="space-y-3 mt-3">
                    @csrf @method('PATCH')
                    <div>
                      <label class="text-sm">{{ __('products.rating') }}</label>
                      <input type="number" name="rating" min="1" max="5" value="{{ $userFeedback->rating }}" class="border rounded p-2 w-24">
                      @error('rating') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                      <label class="text-sm">{{ __('products.comment_max_chars') }}</label>
                      <input type="text" name="comment" maxlength="100" value="{{ $userFeedback->comment }}" class="border rounded p-2 w-full">
                      @error('comment') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">{{ __('products.update') }}</button>
                  </form>
                </details>

                {{-- Xoá --}}
                <form method="POST" action="{{ route('user.products.feedbacks.destroy', [$product->slug, $userFeedback->getKey()]) }}"
                      onsubmit="return confirm('{{ __('products.delete_review_confirm') }}')" class="inline">
                  @csrf @method('DELETE')
                  <button class="px-3 py-2 bg-red-600 text-white rounded-lg text-sm">{{ __('products.delete_review') }}</button>
                </form>
              @else
                @if(!$hasCompletedOrder)
                  <p class="text-sm text-gray-600">{{ __('products.need_to_purchase') }}</p>
                @endif
              @endif
            @else
              <p class="text-sm text-gray-600">{{ __('products.login_to_review', ['url' => route('login')]) }}</p>
            @endauth
          </div>

          {{-- Danh sách feedback --}}
          <div class="space-y-3">
            @forelse ($reviews as $rv)
              <article class="bg-white p-4 rounded-xl shadow">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="text-sm font-medium">{{ $rv->user->name ?? __('products.user') }}</div>
                    <span class="text-xs text-gray-500">{{ $rv->created_at->diffForHumans() }}</span>
                  </div>
                  @if($rv->verified_purchase)
                    <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-700">{{ __('products.verified_purchase') }}</span>
                  @endif
                </div>
                <div class="mt-2"><x-star-rating :value="$rv->rating" :size="3" /></div>
                <p class="mt-2 text-sm text-gray-700">{{ $rv->comment }}</p>
              </article>
            @empty
              <p class="text-sm text-gray-600">{{ __('products.no_reviews') }}</p>
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

  <script>
      document.addEventListener('DOMContentLoaded', function () {
          const btnAdd = document.getElementById('btn-add');
          if (btnAdd) {
              btnAdd.addEventListener('click', function (event) {
                  event.preventDefault();
                  const url = this.href;

                  fetch(url, {
                      method: 'GET',
                      headers: {
                          'X-Requested-With': 'XMLHttpRequest',
                          'Accept': 'application/json',
                      },
                  })
                  .then(response => response.json())
                  .then(data => {
                      console.log('Cart response:', data); // Debugging line
                        if (data.success) {
                            window.dispatchEvent(new CustomEvent('product-added-to-cart'));
                            let cartBadge = document.getElementById('cart-badge');
                            if (data.cartCount > 0) {
                                if (!cartBadge) {
                                    const cartLink = document.querySelector('a[href="{{ route('cart.index') }}"]');
                                    if (cartLink) {
                                        cartBadge = document.createElement('span');
                                        cartBadge.id = 'cart-badge';
                                        cartBadge.className = 'absolute -top-2 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full';
                                        cartLink.appendChild(cartBadge);
                                    }
                                }
                                if (cartBadge) {
                                    cartBadge.textContent = data.cartCount;
                                    cartBadge.classList.remove('hidden');
                                }
                            } else if (cartBadge) {
                                cartBadge.classList.add('hidden');
                            }
                        } else {
                            alert(data.message);
                        }
                  })
                  .catch(error => console.error('Error:', error));
              });
          }
      });
  </script>
</x-user-layout>

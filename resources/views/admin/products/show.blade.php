<x-admin-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        {{-- Header --}}
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 7l4-2 4 2 4-2 4 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7z"/>
              </svg>
              <h1 class="text-2xl font-bold text-gray-800 ml-4">
                {{ $product->product_name }}
              </h1>
            </div>
            <span class="text-sm text-gray-400">#{{ $product->products_id }}</span>
          </div>
        </div>

        @php
          $spec = is_array($product->specifications)
                    ? $product->specifications
                    : (json_decode($product->specifications ?? '[]', true) ?: []);

          $descRaw = (string)($product->description ?? '');
          $description = preg_match('/\[SPEC\].*?\[\/SPEC\]/s', $descRaw)
                        ? trim(preg_replace('/\[SPEC\].*?\[\/SPEC\]/s', '', $descRaw))
                        : $descRaw;

          $sizes  = $spec['size']  ?? [];
          $colors = $spec['color'] ?? [];
        @endphp

        {{-- BODY: 1 card, grid 2x2 bên trong --}}
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
          <div class="rounded-xl border border-gray-200 p-6 md:p-8">
            <div class="grid grid-cols-2 gap-10 items-start">

              {{-- Product Details --}}
              <section>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('products.product_details') }}</h3>
                <dl class="text-base text-gray-700 leading-7 space-y-2">
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.category') }}</dt>
                    <dd class="text-gray-900">{{ $product->category->category_name ?? '-' }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.slug_label') }}</dt>
                    <dd class="text-gray-900 break-all">{{ $product->slug }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.price') }}</dt>
                    <dd class="text-gray-900">{{ number_format($product->product_price, 0, ',', '.') }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.stock') }}</dt>
                    <dd class="text-gray-900">{{ $product->stock_quantity }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.status') }}</dt>
                    <dd>
                      <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full
                        {{ $product->status ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                        {{ $product->status ? __('products.available') : __('products.unavailable') }}
                      </span>
                    </dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.created_at') }}</dt>
                    <dd class="text-gray-900">{{ $product->created_at?->format('Y-m-d H:i') }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">{{ __('products.updated_at') }}</dt>
                    <dd class="text-gray-900">{{ $product->updated_at?->format('Y-m-d H:i') }}</dd>
                  </div>
                </dl>
              </section>

              {{-- Image --}}
              <section>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('products.image') }}</h3>

                @php
                  $gallery = $product->images;                       // đã eager load
                  $primary = $gallery->firstWhere('is_primary', true) ?? $gallery->first();
                  $mainUrl = $primary?->url ?? $product->image_url;  // fallback ảnh cũ
                @endphp

                <div id="admin-gallery" class="space-y-3">
                  {{-- ảnh lớn --}}
                  <div class="w-full rounded-md border bg-gray-50 grid place-items-center p-2">
                    <img id="admin-gallery-main"
                        src="{{ $mainUrl }}"
                        alt="{{ $product->product_name }}"
                        class="max-h-[420px] w-auto h-auto object-contain">
                  </div>

                  {{-- thumbnails --}}
                  <div class="flex gap-3 overflow-x-auto">
                    @forelse($gallery as $img)
                      <button type="button"
                              class="h-20 w-20 border rounded overflow-hidden focus:ring-2 focus:ring-gray-300 {{ $img->is_primary ? 'ring-2 ring-gray-400' : '' }}"
                              data-src="{{ $img->url }}">
                        <img src="{{ $img->url }}" class="h-full w-full object-cover" alt="">
                      </button>
                    @empty
                      {{-- không có gallery -> vẫn hiện ảnh cũ --}}
                      <img src="{{ $product->image_url }}" class="h-20 w-20 border rounded object-cover" alt="">
                    @endforelse
                  </div>
                </div>

                <script>
                  document.addEventListener('DOMContentLoaded', function () {
                    const main = document.getElementById('admin-gallery-main');
                    document.querySelectorAll('#admin-gallery [data-src]').forEach(btn => {
                      btn.addEventListener('click', () => { main.src = btn.dataset.src; });
                    });
                  });
                </script>
              </section>

              {{-- Specifications --}}
              <section>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('products.specifications') }}</h3>
                <dl class="text-base text-gray-700 leading-7 space-y-2">
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Brand</dt>
                    <dd class="text-gray-900">{{ $spec['brand'] ?? '-' }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Fit</dt>
                    <dd class="text-gray-900">{{ $spec['fit'] ?? '-' }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Material</dt>
                    <dd class="text-gray-900">{{ $spec['material'] ?? '-' }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Care</dt>
                    <dd class="text-gray-900">{{ $spec['care'] ?? '-' }}</dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Sizes</dt>
                    <dd class="text-gray-900">
                      {{ is_array($sizes) ? (count($sizes) ? implode(', ', $sizes) : '-') : ($sizes ?: '-') }}
                    </dd>
                  </div>
                  <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Colors</dt>
                    <dd class="text-gray-900">
                      {{ is_array($colors) ? (count($colors) ? implode(', ', $colors) : '-') : ($colors ?: '-') }}
                    </dd>
                  </div>
                </dl>
              </section>

              {{-- Description --}}
              <section>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('products.description') }}</h3>
                <div class="text-base text-gray-800 leading-7">
                  {!! nl2br(e($description)) ?: '-' !!}
                </div>
              </section>

            </div>
          </div>
        </div>

        {{-- Footer --}}
        <div class="p-6 sm:px-20 bg-gray-50 flex justify-between items-center">
          <a href="{{ route('admin.products.index') }}"
             class="inline-flex items-center px-4 py-2 border-2 border-gray-800 bg-white text-gray-800 rounded-md
                    font-semibold text-xs uppercase tracking-widest hover:bg-gray-800 hover:text-white transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            {{ __('products.back') }}
          </a>

          <a href="{{ route('admin.products.edit', $product) }}"
             class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md
                    font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-yellow-500
                    active:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300
                    transition">
            {{ __('products.edit_product') }}
          </a>
        </div>

      </div>
    </div>
  </div>
</x-admin-layout>

<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('products.products') }}</h2>
    </x-slot>

<div x-data="{ openFilter: false }" class="max-w-7xl mx-auto pt-6 pb-0 px-4 sm:px-6 lg:px-8">

        {{-- Thanh trên: Nút filter + số lượng --}}
        <div class="flex items-center justify-between mb-4">
            <button @click="openFilter = !openFilter"
                class="flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2l-7 7v6l-4-2v-4L3 6V4z"/>
                </svg>
            </button>

            <p class="text-sm text-gray-600">
                {{ __('products.showing_products', ['count' => $products->count(), 'total' => $products->total()]) }}
                @if(request()->hasAny(['search','category','min_price','max_price','sort']))
                    {{ __('products.filter_applied') }}
                @endif
            </p>
        </div>

        {{-- Form filter xổ xuống --}}
        <div x-show="openFilter" x-transition class="mb-6 bg-white p-4 rounded-lg shadow border">
            <form method="GET" action="{{ route('user.products.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Giữ search --}}
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                {{-- Danh mục --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">{{ __('products.category') }}</label>
                    <select name="category" id="category"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">{{ __('products.all') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->categories_id }}" {{ request('category') == $category->categories_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Giá từ --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('products.price_from') }}</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" min="0"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                {{-- Giá đến --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('products.price_to') }}</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" min="0"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                {{-- Sắp xếp --}}
                <div>
                    <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">{{ __('products.sort') }}</label>
                    <select name="sort" id="sort"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>{{ __('products.sort_by_latest') }}</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>{{ __('products.sort_by_price_asc') }}</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>{{ __('products.sort_by_price_desc') }}</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>{{ __('products.sort_by_name_asc') }}</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>{{ __('products.sort_by_name_desc') }}</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="sm:col-span-2 lg:col-span-4 flex gap-2">
                    <button type="submit"
                            class="flex-1 text-center bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                        {{ __('products.apply') }}
                    </button>
                    <a href="{{ route('user.products.index') }}"
                       class="flex-1 text-center bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                        {{ __('products.clear') }}
                    </a>
                </div>
            </form>
        </div>


    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $p)
                @php
                    // Loại bỏ khối [SPEC]...[/SPEC] trước khi rút gọn
                    $plain = preg_replace('/\[SPEC\].*?\[\/SPEC\]/s', '', $p->description ?? '');
                    $short = \Illuminate\Support\Str::limit(trim($plain), 50);

                    // Format giá VND: 1.234.567 ₫
                    $price = number_format((float) $p->product_price, 0, ',', '.') . ' ₫';
                @endphp

                <div class="bg-white rounded-2xl shadow-sm hover:shadow p-4 flex flex-col transition">
                    <a href="{{ route('user.products.show', ['product' => $p->slug]) }}" class="block">
                        <img
                            src="{{ $p->image_url }}"
                            alt="{{ $p->product_name }}"
                            class="rounded-xl aspect-[3/4] object-cover mb-3 w-full"
                            loading="lazy"
                        >
                    </a>

                    <h3 class="font-medium text-gray-900 line-clamp-2">
                        <a href="{{ route('user.products.show', $p->slug) }}" class="hover:underline">
                            {{ $p->product_name }}
                        </a>
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">{{ $short }}</p>
                    
                    <div class="mt-auto pt-3">
                        <div class="text-lg font-semibold text-gray-900">{{ $price }}</div>

                        {{-- Nút thêm vào giỏ hàng --}}
                        @auth
                            <a href="{{ route('cart.add', ['id' => $p->products_id, 'qty' => 1]) }}"
                               class="mt-2 inline-block w-full border border-black bg-white text-black text-center py-2 px-4 rounded-lg hover:bg-black hover:text-white transition">
                                {{ __('products.add_to_cart') }}
                            </a>

                            <a href="{{ route('cart.add', ['id' => $p->products_id, 'qty' => 1, 'redirect' => 'checkout']) }}"
                                class="mt-2 inline-block w-full border border-black bg-white text-black text-center py-2 px-4 rounded-lg hover:bg-black hover:text-white transition">
                                {{ __('products.buy_now') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="mt-2 inline-block w-full border border-gray-400 bg-white text-gray-600 text-center py-2 px-4 rounded-lg hover:bg-gray-600 hover:text-white transition">
                                {{ __('products.login_to_buy') }}
                            </a>
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-gray-600 col-span-full">{{ __('products.no_products_available') }}</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</x-user-layout>

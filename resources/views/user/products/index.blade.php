<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sản phẩm</h2>
    </x-slot>

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
                                Thêm vào giỏ
                            </a>

                            <a href="{{ route('cart.add', ['id' => $p->products_id, 'qty' => 1, 'redirect' => 'checkout']) }}"
                                class="mt-2 inline-block w-full border border-black bg-white text-black text-center py-2 px-4 rounded-lg hover:bg-black hover:text-white transition">
                                Mua ngay
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="mt-2 inline-block w-full border border-gray-400 bg-white text-gray-600 text-center py-2 px-4 rounded-lg hover:bg-gray-600 hover:text-white transition">
                                Đăng nhập để mua
                            </a>
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-gray-600 col-span-full">Chưa có sản phẩm nào.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</x-user-layout>


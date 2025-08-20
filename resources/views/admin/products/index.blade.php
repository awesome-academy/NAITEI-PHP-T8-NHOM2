<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Flash success --}}
                    @if ($message = Session::get('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    {{-- Errors --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Header --}}
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">{{ __('products.products') }}</h1>
                        <div>
                            <a href="{{ route('admin.products.trashed') }}" class="text-sm text-gray-600 hover:text-gray-900">
                                {{ __('products.trashed_products') }}&nbsp;&nbsp;&nbsp;
                            </a>
                            <a href="{{ route('admin.products.create') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('products.create_product') }}
                            </a>
                        </div>
                    </div>

                    {{-- Filter --}}
                    <form method="get" class="flex flex-wrap gap-3 items-end mb-4">
                        <div>
                            <label class="block text-sm mb-1">{{ __('common.search') }}</label>
                            <input type="text" name="keyword" value="{{ request('keyword') }}"
                                   class="border rounded px-3 py-2 w-64" placeholder="{{ __('products.search_products') }}">
                        </div>

                        <div>
                            <label class="block text-sm mb-1">{{ __('products.category') }}</label>
                            <select name="category" class="border rounded px-3 py-2">
                                <option value="">{{ __('products.all') }}</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->categories_id }}"
                                            @selected(request('category') == $c->categories_id)>
                                        {{ $c->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm mb-1">{{ __('products.status') }}</label>
                            <select name="status" class="border rounded px-3 py-2">
                                <option value="">{{ __('products.all') }}</option>
                                <option value="1" @selected(request('status')==='1')>{{ __('products.available') }}</option>
                                <option value="0" @selected(request('status')==='0')>{{ __('products.unavailable') }}</option>
                            </select>
                        </div>

                        <button class="inline-flex items-center justify-center py-3 px-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">
                            {{ __('common.search') }}
                        </button>
                    </form>

                    {{-- Table --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">{{ __('products.name') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('products.category') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('products.price') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('products.stock') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('products.status') }}</th>
                                    <th scope="col" class="px-6 py-3"><span class="sr-only">{{ __('common.view') }}</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $p)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $p->products_id }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <a href="{{ route('admin.products.show', $p) }}" class="hover:underline">
                                                {{ $p->product_name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">{{ $p->category->category_name ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ number_format($p->product_price, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4">{{ $p->stock_quantity }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $p->status ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                                                {{ $p->status ? __('products.available') : __('products.unavailable') }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('admin.products.destroy', $p) }}" method="POST"
                                                  onsubmit="return confirm('{{ __('products.delete_product_confirm') }}');">
                                                <a href="{{ route('admin.products.edit', $p) }}"
                                                   class="font-medium text-blue-600 hover:underline">{{ __('common.edit') }}</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 hover:underline ml-4">{{ __('common.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">{{ __('products.no_products_found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($message = Session::get('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">{{ __('common.trashed_categories') }}</h1>
                        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('common.back_to_categories') }}
                        </a>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">{{ __('common.category_name') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('common.slug') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('common.deleted_at') }}</th>
                                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $category->categories_id }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $category->category_name }}
                                        </td>
                                        <td class="px-6 py-4">{{ $category->slug }}</td>
                                        <td class="px-6 py-4">{{ $category->deleted_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('admin.categories.restore', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this category?');">
                                                @csrf
                                                <button type="submit" class="font-medium text-blue-600 hover:underline">{{ __('common.restore_category') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">{{ __('common.no_trashed_categories_found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

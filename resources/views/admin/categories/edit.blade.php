<x-admin-layout>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('common.edit_category', ['name' => $category->category_name]) }}</h1>
                        

                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Category Name -->
                        <div>
                            <label for="category_name" class="block font-medium text-sm text-gray-700">{{ __('common.category_name') }}</label>
                            <input id="category_name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}" required autofocus />
                            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
                        </div>

                        <!-- Slug -->
                        <div class="mt-4">
                            <label for="slug" class="block font-medium text-sm text-gray-700">{{ __('common.slug_optional') }}</label>
                            <input id="slug" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="slug" value="{{ old('slug', $category->slug) }}" />
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('common.description') }}</label>
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $category->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Sort Order -->
                        <div class="mt-4">
                            <label for="sort_order" class="block font-medium text-sm text-gray-700">{{ __('common.sort_order') }}</label>
                            <input id="sort_order" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" required />
                            <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline mr-4">
                                {{ __('common.cancel') }}
                            </a>

                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('common.update') }} {{ __('common.categories') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const categoryNameInput = document.getElementById('category_name');
        const slugInput = document.getElementById('slug');

        categoryNameInput.addEventListener('input', function() {
            const slug = this.value.toLowerCase().replace(/[^a-z0-9\s-]/g, '-').replace(/\s+/g, '-').replace(/--+/g, '-');
            slugInput.value = slug;
        });
    </script>
</x-admin-layout>
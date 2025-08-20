<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                              </svg>
                            <h1 class="text-2xl font-bold text-gray-800 ml-4">{{ $category->category_name }}</h1>
                        </div>
            
                    </div>
                </div>

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('common.category_details') }}</h3>
                            <dl class="mt-2 text-sm text-gray-600 space-y-4">
                                <div class="flex justify-between">
                                    <dt class="font-medium">{{ __('common.id') }}</dt>
                                    <dd class="text-gray-900">{{ $category->categories_id }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-medium">{{ __('common.slug') }}</dt>
                                    <dd class="text-gray-900">{{ $category->slug }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-medium">{{ __('common.sort_order') }}</dt>
                                    <dd class="text-gray-900">{{ $category->sort_order }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-medium">{{ __('common.created_at') }}</dt>
                                    <dd class="text-gray-900">{{ $category->created_at->format('M d, Y') }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-medium">{{ __('common.last_updated') }}</dt>
                                    <dd class="text-gray-900">{{ $category->updated_at->format('M d, Y') }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('common.description') }}</h3>
                            <div class="mt-2 text-sm text-gray-600">
                                {{ $category->description ?? __('common.no_description') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:px-20 bg-gray-50 flex justify-between items-center">
                    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 border-2 border-gray-800 bg-white text-gray-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-800 hover:text-white transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        {{ __('common.back') }}
                    </a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('common.edit') }} {{ __('common.categories') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
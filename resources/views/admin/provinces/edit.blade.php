<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">{{ __('common.edit_province') }}</h1>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ __('common.whoops') }}</strong>
                            <span class="block sm:inline">{{ __('common.problems_with_input') }}</span>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.provinces.update', $province->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('common.name') }}</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('name', $province->name) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="shipping_fee" class="block text-sm font-medium text-gray-700">{{ __('common.shipping_fee') }}</label>
                            <input type="number" name="shipping_fee" id="shipping_fee" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('shipping_fee', $province->shipping_fee) }}" required>
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('admin.provinces.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">{{ __('common.cancel') }}</a>
                            <button type="submit" class="bg-gray-900 text-white font-bold py-2 px-4 rounded">{{ __('common.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

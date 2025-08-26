<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users.edit_address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ __('users.edit_address') }}</h1>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ __('Whoops!') }}</strong>
                            <span class="block sm:inline">{{ __('There were some problems with your input.') }}</span>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.addresses.update', $address->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="recipient_name" class="block text-sm font-medium text-gray-700">{{ __('users.recipient_name') }}</label>
                            <input type="text" name="recipient_name" id="recipient_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('recipient_name', $address->recipient_name) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="recipient_phone" class="block text-sm font-medium text-gray-700">{{ __('users.recipient_phone') }}</label>
                            <input type="text" name="recipient_phone" id="recipient_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('recipient_phone', $address->recipient_phone) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="province_id" class="block text-sm font-medium text-gray-700">{{ __('users.province') }}</label>
                            <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ $address->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">{{ __('users.address') }}</label>
                            <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('address', $address->address) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="is_default" class="inline-flex items-center">
                                <input type="checkbox" name="is_default" id="is_default" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ $address->is_default ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">{{ __('users.set_as_default') }}</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('user.addresses.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">{{ __('users.cancel') }}</a>
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('users.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

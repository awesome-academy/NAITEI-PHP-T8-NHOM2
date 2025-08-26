<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users.my_addresses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">{{ __('users.my_addresses') }}</h1>
                        <a href="{{ route('user.addresses.create') }}" class="bg-gray-900 text-white font-bold py-2 px-4 rounded">{{ __('users.add_new_address') }}</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($addresses as $address)
                            <div class="border rounded-lg p-4 {{ $address->is_default ? 'border-blue-500' : '' }}">
                                <p class="font-bold">{{ $address->recipient_name }} {{ $address->is_default ? '(' . __('users.default') . ')' : '' }}</p>
                                <p>{{ $address->address }}, {{ $address->province->name }}</p>
                                <p>{{ $address->recipient_phone }}</p>
                                <div class="mt-4">
                                    <a href="{{ route('user.addresses.edit', $address->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('users.edit') }}</a>
                                    <form action="{{ route('user.addresses.destroy', $address->id) }}" method="POST" class="inline-block ml-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('{{ __('users.are_you_sure') }}')">{{ __('users.delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

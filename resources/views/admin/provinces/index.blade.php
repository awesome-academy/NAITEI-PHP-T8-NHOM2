<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">{{ __('common.provinces') }}</h1>
                        <a href="{{ route('admin.provinces.create') }}" class="bg-gray-900 text-white font-bold py-2 px-4 rounded">{{ __('common.create_province') }}</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @endif

                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">{{ __('common.id') }}</th>
                                <th class="py-2 px-4 border-b">{{ __('common.name') }}</th>
                                <th class="py-2 px-4 border-b">{{ __('common.shipping_fee') }}</th>
                                <th class="py-2 px-4 border-b">{{ __('common.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provinces as $province)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $province->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $province->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ number_format($province->shipping_fee, 0, ',', '.') }} đ</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('admin.provinces.edit', $province->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('common.edit') }}</a>
                                        <form action="{{ route('admin.provinces.destroy', $province->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('{{ __('common.are_you_sure') }}')">{{ __('common.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $provinces->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

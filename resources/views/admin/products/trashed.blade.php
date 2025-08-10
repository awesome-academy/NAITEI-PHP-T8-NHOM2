<x-admin-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
              <span class="block sm:inline">{{ $message }}</span>
            </div>
          @endif

          <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Trashed Products</h1>
            <a href="{{ route('admin.products.index') }}"
               class="inline-flex items-center px-4 py-2 border-2 border-gray-800 bg-white text-gray-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-800 hover:text-white transition">
              ← Back to Products
            </a>
          </div>

          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th class="px-6 py-3">ID</th>
                  <th class="px-6 py-3">Name</th>
                  <th class="px-6 py-3">Category</th>
                  <th class="px-6 py-3">Deleted At</th>
                  <th class="px-6 py-3 text-right"><span class="sr-only">Actions</span></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $p)
                  <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $p->products_id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                      {{ $p->product_name }}
                    </td>
                    <td class="px-6 py-4">{{ $p->category->category_name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ optional($p->deleted_at)->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4 text-right">
                      <form action="{{ route('admin.products.restore', $p) }}" method="POST"
                            onsubmit="return confirm('Khôi phục sản phẩm này?');" class="inline">
                        @csrf
                        <button type="submit" class="font-medium text-blue-600 hover:underline">Restore</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr class="bg-white border-b">
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No trashed products.</td>
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

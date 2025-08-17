<x-admin-layout>
  {{-- Ẩn phần tử Alpine khi chưa init --}}
  <style>[x-cloak]{display:none!important}</style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
              <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
          @endif

          <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Product #{{ $product->products_id }}</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900">← Back</a>
          </div>

          <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf @method('PUT')

            <div>
              <label class="block text-sm mb-1">Category</label>
              <select name="categories_id" class="border rounded px-3 py-2 w-64" required>
                @foreach($categories as $c)
                  <option value="{{ $c->categories_id }}" @selected(old('categories_id', $product->categories_id) == $c->categories_id)>
                    {{ $c->category_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">Name</label>
              <input name="product_name" value="{{ old('product_name', $product->product_name) }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
              <label class="block text-sm mb-1">Slug</label>
              <input name="slug" value="{{ old('slug', $product->slug) }}" class="border rounded px-3 py-2 w-full">
            </div>

            <div>
              <label class="block text-sm mb-1">Description</label>
              <textarea name="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description', $freeDesc ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm mb-1">Price</label>
                <input type="number" step="1" min="0" name="product_price" value="{{ old('product_price', $product->product_price) }}" class="border rounded px-3 py-2 w-full number-noarrow" required>
              </div>
              <div>
                <label class="block text-sm mb-1">Stock</label>
                <input type="number" step="1" min="0" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="border rounded px-3 py-2 w-full number-noarrow" required>
              </div>
              <div>
                <label class="block text-sm mb-1">Status</label>
                <select name="status" class="border rounded px-3 py-2 w-full">
                  <option value="1" @selected(old('status', $product->status)==1)>Available</option>
                  <option value="0" @selected(old('status', $product->status)==0)>Unavailable</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm mb-1">Image</label>
              <input type="file" name="image" accept="image/*" class="border rounded px-3 py-2 w-full">
              <div class="mt-2">
                <img
                  src="{{ $product->image_url ?: asset('images/placeholder.png') }}"
                  alt="{{ $product->product_name ?: 'No image available' }}"
                  style="max-height:120px">
              </div>

              <label class="inline-flex items-center gap-2 mt-2">
                <input type="checkbox" name="remove_image" value="1" class="rounded" {{ old('remove_image') ? 'checked' : '' }}>
                <span>Xóa ảnh hiện tại</span>
              </label>
              @error('image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>


            {{-- Specifications --}}
            {{-- Size (dropdown multi, Alpine, không dùng biến trung gian) --}}
            <div class="relative"
                 x-data="{
                   open:false,
                   options: @js(array_values(array_unique(array_merge(
                     config('product_specs.sizes_top', []),
                     config('product_specs.sizes_bottom', [])
                   )))),
                   selected: @js(array_values((array) old('spec_size', $specSize ?? [])))
                 }">
              <label class="block text-sm mb-1">Size</label>

              <button type="button" @click="open = !open"
                      class="w-full bg-white border border-gray-300 rounded px-3 py-2 flex items-center justify-between text-left text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-400">
                <span class="truncate" x-text="selected.length ? selected.join(', ') : 'Chọn size'"></span>
                <svg class="w-4 h-4 opacity-70" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 111.06 1.061l-4.24 4.24a.75.75 0 01-1.06 0l-4.24-4.24a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
              </button>

              <div x-cloak x-show="open" x-transition @click.outside="open=false"
                   class="absolute z-20 mt-1 w-full bg-white border rounded shadow">
                <div class="max-h-56 overflow-y-auto p-2 space-y-1">
                  <template x-for="opt in options" :key="opt">
                    <label class="flex items-center gap-2 px-2 py-1 hover:bg-gray-50 cursor-pointer">
                      <input class="rounded" type="checkbox" :value="opt" name="spec_size[]" x-model="selected">
                      <span x-text="opt"></span>
                    </label>
                  </template>
                </div>
                <div class="p-2 flex justify-end gap-2 border-t">
                  <button type="button" class="text-sm px-3 py-1 border rounded hover:bg-gray-50" @click="selected=[]">Clear</button>
                  <button type="button" class="text-sm px-3 py-1 bg-gray-800 text-white rounded" @click="open=false">Apply</button>
                </div>
              </div>
            </div>

            <div>
              <label class="block text-sm mb-1">Color (nhập nhiều, ngăn cách bởi dấu phẩy)</label>
              <input name="spec_color" value="{{ old('spec_color', $specColorStr ?? '') }}" class="border rounded px-3 py-2 w-full" placeholder="Đen, Trắng, Be...">
            </div>

            <div>
              <label class="block text-sm mb-1">Fit (phom)</label>
              <select name="spec_fit" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_fit', $specFit ?? '') ? '' : 'selected' }}>Chọn fit</option>
                @foreach($fits as $fit)
                  <option value="{{ $fit }}" @selected(old('spec_fit', $specFit ?? '') === $fit)>{{ $fit }}</option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">Brand</label>
              <select name="spec_brand" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_brand', $specBrand ?? '') ? '' : 'selected' }}>Chọn brand</option>
                @foreach($brands as $b)
                  <option value="{{ $b }}" @selected(old('spec_brand', $specBrand ?? '') === $b)>{{ $b }}</option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">Material (chất liệu)</label>
              <select name="spec_material" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_material', $specMaterial ?? '') ? '' : 'selected' }}>Chọn chất liệu</option>
                @foreach($materials as $m)
                  <option value="{{ $m }}" @selected(old('spec_material', $specMaterial ?? '') === $m)>{{ $m }}</option>
                @endforeach
              </select>
            </div>

            <div class="sm:col-span-2 lg:col-span-3">
              <label class="block text-sm mb-1">Care (hướng dẫn bảo quản)</label>
              <select name="spec_care" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_care', $specCare ?? '') ? '' : 'selected' }}>Chọn hướng dẫn bảo quản</option>
                @foreach($careOps as $c)
                  <option value="{{ $c }}" @selected(old('spec_care', $specCare ?? '') === $c)>{{ $c }}</option>
                @endforeach
              </select>
            </div>

            <div class="flex gap-3">
              <button class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest bg-gray-800 text-white hover:bg-gray-700">
                Update
              </button>
              <a href="{{ route('admin.products.index') }}"
                 class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest border border-gray-300 text-gray-700 hover:bg-gray-50">
                Cancel
              </a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-admin-layout>

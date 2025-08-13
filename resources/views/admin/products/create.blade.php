<x-admin-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          {{-- errors (sẽ hiện khi bước lưu hoạt động) --}}
          @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Create Product</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900">← Back</a>
          </div>

          {{-- CHƯA LƯU – chỉ hiển thị form, bước sau mới xử lý POST --}}
          <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
              <label class="block text-sm mb-1">Category</label>
              <select name="categories_id" class="border rounded px-3 py-2 w-64" required>
                @foreach($categories as $c)
                  <option value="{{ $c->categories_id }}" @selected(old('categories_id')==$c->categories_id)>
                    {{ $c->category_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">Name</label>
              <input name="product_name" value="{{ old('product_name') }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
              <label class="block text-sm mb-1">Slug <span class="text-gray-400">(bỏ trống sẽ tự tạo)</span></label>
              <input name="slug" value="{{ old('slug') }}" class="border rounded px-3 py-2 w-full">
            </div>

            <div>
              <label class="block text-sm mb-1">Description</label>
              <textarea name="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm mb-1">Price</label>
                <input type="number" min="0" step="1" name="product_price" value="{{ old('product_price', 0) }}" class="border rounded px-3 py-2 w-full" required>
              </div>
              <div>
                <label class="block text-sm mb-1">Stock</label>
                <input type="number" min="0" step="1" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" class="border rounded px-3 py-2 w-full" required>
              </div>
              <div>
                <label class="block text-sm mb-1">Status</label>
                <select name="status" class="border rounded px-3 py-2 w-full">
                  <option value="1" @selected(old('status','1')==='1')>Available</option>
                  <option value="0" @selected(old('status')==='0')>Unavailable</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm mb-1">Image</label>
              <input type="file" name="image" accept="image/*" class="border rounded px-3 py-2 w-full">
            </div>

            {{-- Specifications --}}
            <!-- size -->
            <div class="relative" 
                x-data="{ 
                    open:false, 
                    options: ['XS','S','M','L','XL','XXL'], 
                    selected: @json(collect(old('spec_size', []))->values())
                }">
            <label class="block text-sm mb-1">Size</label>

            <button type="button" @click="open = !open"
                    class="w-full bg-white border border-gray-300 rounded px-3 py-2 flex items-center justify-between text-left text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-400">
                <span class="truncate" 
                    x-text="selected.length ? selected.join(', ') : 'Chọn size'"></span>
                <svg class="w-4 h-4 opacity-70" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 111.06 1.061l-4.24 4.24a.75.75 0 01-1.06 0l-4.24-4.24a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
            </button>

            <!-- Panel dropdown -->
            <div x-show="open" @click.away="open=false" x-transition
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
                <button type="button" class="text-sm px-3 py-1 border rounded hover:bg-gray-50"
                        @click="selected=[]">Clear</button>
                <button type="button" class="text-sm px-3 py-1 bg-gray-800 text-white rounded"
                        @click="open=false">Apply</button>
                </div>
            </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Color (nhập nhiều, ngăn cách bởi dấu phẩy)</label>
                <input name="spec_color" value="{{ old('spec_color') }}" class="border rounded px-3 py-2 w-full" placeholder="Đen, Trắng, Be...">
            </div>

            {{-- Fit --}}
            <div>
            <label class="block text-sm mb-1">Fit</label>
            <select name="spec_fit" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_fit') ? '' : 'selected' }}>Chọn fit</option>
                @foreach (config('product_specs.fits') as $fit)
                    <option value="{{ $fit }}" @selected(old('spec_fit') === $fit)>{{ $fit }}</option>
                @endforeach
            </select>
            </div>



            <div>
                <label class="block text-sm mb-1">Brand</label>
                <select name="spec_brand" class="border rounded px-3 py-2 w-full" required>
                    <option value="" disabled {{ old('spec_brand') ? '' : 'selected' }}>Chọn brand</option>
                    @foreach($brands as $b)
                    <option value="{{ $b }}" {{ old('spec_brand')===$b ? 'selected' : '' }}>{{ $b }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label class="block text-sm mb-1">Material (chất liệu)</label>
                <select name="spec_material" class="border rounded px-3 py-2 w-full" required>
                    <option value="" disabled {{ old('spec_material') ? '' : 'selected' }}>Chọn chất liệu</option>
                    @foreach($materials as $m)
                    <option value="{{ $m }}" {{ old('spec_material')===$m ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
            </div>


            <div class="sm:col-span-2 lg:col-span-3">
                <label class="block text-sm mb-1">Care (hướng dẫn bảo quản)</label>
                <select name="spec_care" class="border rounded px-3 py-2 w-full" required>
                    <option value="" disabled {{ old('spec_care') ? '' : 'selected' }}>Chọn hướng dẫn bảo quản</option>
                    @foreach($careOps as $c)
                    <option value="{{ $c }}" {{ old('spec_care')===$c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest bg-gray-800 text-white hover:bg-gray-700">
                Save
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

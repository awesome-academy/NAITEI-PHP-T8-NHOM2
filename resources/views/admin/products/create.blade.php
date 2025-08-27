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
            <h1 class="text-2xl font-bold text-gray-800">{{ __('products.create_product') }}</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('products.back') }}</a>
          </div>

          {{-- CHƯA LƯU – chỉ hiển thị form, bước sau mới xử lý POST --}}
          <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
              <label class="block text-sm mb-1">{{ __('products.category') }}</label>
              <select name="categories_id" class="border rounded px-3 py-2 w-64" required>
                @foreach($categories as $c)
                  <option value="{{ $c->categories_id }}" @selected(old('categories_id')==$c->categories_id)>
                    {{ $c->category_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.product_name') }}</label>
              <input name="product_name" value="{{ old('product_name') }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.slug_label') }} <span class="text-gray-400">({{ __('products.slug_optional') }})</span></label>
              <input name="slug" value="{{ old('slug') }}" class="border rounded px-3 py-2 w-full">
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.description') }}</label>
              <textarea name="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm mb-1">{{ __('products.price') }}</label>
                <input type="number" min="0" step="1" name="product_price" value="{{ old('product_price', 0) }}" class="border rounded px-3 py-2 w-full" required>
              </div>
              <div>
                <label class="block text-sm mb-1">{{ __('products.stock') }}</label>
                <input type="number" min="0" step="1" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" class="border rounded px-3 py-2 w-full" required>
              </div>
              <div>
                <label class="block text-sm mb-1">{{ __('products.status') }}</label>
                <select name="status" class="border rounded px-3 py-2 w-full">
                  <option value="1" @selected(old('status','1')==='1')>{{ __('products.available') }}</option>
                  <option value="0" @selected(old('status')==='0')>{{ __('products.unavailable') }}</option>
                </select>
              </div>
            </div>

            <div x-data="{ files: [], limit: 5 }">
              <label class="block text-sm mb-1">{{ __('products.image') }} (tối đa 5 ảnh)</label>

              <input
                type="file"
                name="images[]"
                accept="image/*"
                multiple
                class="border rounded px-3 py-2 w-full"
                @change="files = Array.from($event.target.files).slice(0, limit)"
              >
              @error('images') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
              @error('images.*') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

              {{-- preview đơn giản --}}
              <div class="mt-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3" x-show="files.length">
                <template x-for="(f, idx) in files" :key="idx">
                  <div class="border rounded p-1">
                    <img :src="URL.createObjectURL(f)" class="w-full h-24 object-cover rounded">
                    <div class="text-xs text-gray-500 mt-1" x-text="f.name"></div>
                    <div class="mt-1">
                      <label class="inline-flex items-center gap-2 text-xs">
                        <input type="radio" name="primary_image_id" disabled class="rounded" checked x-show="idx === 0">
                        <span x-text="idx === 0 ? 'Ảnh chính (mặc định)' : ''"></span>
                      </label>
                    </div>
                  </div>
                </template>
              </div>

              <p class="text-xs text-gray-500 mt-1">Ảnh đầu tiên sẽ được đặt làm ảnh chính sau khi lưu.</p>
            </div>

            {{-- Specifications --}}
            <!-- size -->
            <div class="relative" 
                x-data="{ 
                    open:false, 
                    options: ['XS','S','M','L','XL','XXL'], 
                    selected: @json(collect(old('spec_size', []))->values())
                }">
            <label class="block text-sm mb-1">{{ __('products.size') }}</label>

            <button type="button" @click="open = !open"
                    class="w-full bg-white border border-gray-300 rounded px-3 py-2 flex items-center justify-between text-left text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-400">
                <span class="truncate" 
                    x-text="selected.length ? selected.join(', ') : '{{ __('products.fit_placeholder') }}'"></span>
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
                <label class="block text-sm mb-1">{{ __('products.color') }} ({{ __('products.color_placeholder') }})</label>
                <input name="spec_color" value="{{ old('spec_color') }}" class="border rounded px-3 py-2 w-full" placeholder="Đen, Trắng, Be...">
            </div>

            {{-- Fit --}}
            <div>
            <label class="block text-sm mb-1">{{ __('products.fit') }}</label>
            <select name="spec_fit" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_fit') ? '' : 'selected' }}>{{ __('products.fit_placeholder') }}</option>
                @foreach (config('product_specs.fits') as $fit)
                    <option value="{{ $fit }}" @selected(old('spec_fit') === $fit)>{{ $fit }}</option>
                @endforeach
            </select>
            </div>



            <div>
                <label class="block text-sm mb-1">{{ __('products.brand') }}</label>
                <select name="spec_brand" class="border rounded px-3 py-2 w-full" required>
                    <option value="" disabled {{ old('spec_brand') ? '' : 'selected' }}>{{ __('products.brand_placeholder') }}</option>
                    @foreach($brands as $b)
                    <option value="{{ $b }}" {{ old('spec_brand')===$b ? 'selected' : '' }}>{{ $b }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label class="block text-sm mb-1">{{ __('products.material') }} (chất liệu)</label>
                <select name="spec_material" class="border rounded px-3 py-2 w-full" required>
                    <option value="" disabled {{ old('spec_material') ? '' : 'selected' }}>{{ __('products.material_placeholder') }}</option>
                    @foreach($materials as $m)
                    <option value="{{ $m }}" {{ old('spec_material')===$m ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
            </div>


            <div class="sm:col-span-2 lg:col-span-3">
                <label class="block text-sm mb-1">{{ __('products.care') }} (hướng dẫn bảo quản)</label>
                <select name="spec_care" class="border rounded px-3 py-2 w-full" required>
                    <option value="" disabled {{ old('spec_care') ? '' : 'selected' }}>{{ __('products.care_placeholder') }}</option>
                    @foreach($careOps as $c)
                    <option value="{{ $c }}" {{ old('spec_care')===$c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest bg-gray-800 text-white hover:bg-gray-700">
                {{ __('products.save') }}
            </button>
            <a href="{{ route('admin.products.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest border border-gray-300 text-gray-700 hover:bg-gray-50">
                {{ __('products.cancel') }}
            </a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-admin-layout>

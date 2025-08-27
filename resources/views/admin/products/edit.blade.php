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
            <h1 class="text-2xl font-bold text-gray-800">{{ __('products.edit_product') }} #{{ $product->products_id }}</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('products.back') }}</a>
          </div>

          <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf @method('PUT')

            {{-- Img --}}
            <div>
              <label class="block text-sm mb-1">{{ __('products.category') }}</label>
              <select name="categories_id" class="border rounded px-3 py-2 w-64" required>
                @foreach($categories as $c)
                  <option value="{{ $c->categories_id }}" @selected(old('categories_id', $product->categories_id) == $c->categories_id)>
                    {{ $c->category_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.product_name') }}</label>
              <input name="product_name" value="{{ old('product_name', $product->product_name) }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.slug_label') }}</label>
              <input name="slug" value="{{ old('slug', $product->slug) }}" class="border rounded px-3 py-2 w-full">
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.description') }}</label>
              <textarea name="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description', $freeDesc ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div>
                <label class="block text-sm mb-1">{{ __('products.price') }}</label>
                <input type="number" step="1" min="0" name="product_price" value="{{ old('product_price', $product->product_price) }}" class="border rounded px-3 py-2 w-full number-noarrow" required>
              </div>
              <div>
                <label class="block text-sm mb-1">{{ __('products.stock') }}</label>
                <input type="number" step="1" min="0" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="border rounded px-3 py-2 w-full number-noarrow" required>
              </div>
              <div>
                <label class="block text-sm mb-1">{{ __('products.status') }}</label>
                <select name="status" class="border rounded px-3 py-2 w-full">
                  <option value="1" @selected(old('status', $product->status)==1)>{{ __('products.available') }}</option>
                  <option value="0" @selected(old('status', $product->status)==0)>{{ __('products.unavailable') }}</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.image') }}</label>

              @php $existingImages = $product->images()->orderBy('sort_order')->get(); @endphp

              {{-- A Gallery hiện có: chọn ảnh chính + đánh dấu xoá --}}
              @if($existingImages->count())
                <div class="mt-2">
                  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
                    @foreach($existingImages as $img)
                      <div class="border rounded p-2">
                        <img src="{{ $img->url }}" alt="" class="w-full h-24 object-cover rounded">
                        <div class="mt-2 space-y-1">
                          <label class="flex items-center gap-2 text-sm">
                            <input type="radio"
                                  name="primary_image_id"
                                  value="{{ $img->product_image_id }}"
                                  class="rounded"
                                  @checked(old('primary_image_id', optional($product->primaryImage()->first())->product_image_id) == $img->product_image_id)>
                            <span>Đặt làm ảnh chính</span>
                          </label>

                          <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox"
                                  name="remove_image_ids[]"
                                  value="{{ $img->product_image_id }}"
                                  class="rounded">
                            <span>Xoá ảnh này</span>
                          </label>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <p class="text-xs text-gray-500 mt-2">
                    Bạn có thể chọn 1 ảnh chính và đánh dấu xoá những ảnh không dùng.
                  </p>
                </div>
              @endif

              {{-- B Thêm ảnh mới (giới hạn còn lại ≤ 5) --}}
              <div x-data="{ files: [], limit: Math.max(0, 5 - {{ $existingImages->count() }}) }" class="mt-4">
                <label class="block text-sm mb-1">
                  Thêm ảnh mới (tối đa còn lại: <span x-text="limit"></span>)
                </label>

                <input
                  type="file"
                  name="images[]"
                  accept="image/*"
                  multiple
                  class="border rounded px-3 py-2 w-full"
                  @change="files = Array.from($event.target.files).slice(0, limit)"
                  :disabled="limit <= 0"
                >
                @error('images') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                @error('images.*') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                <div class="mt-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3" x-show="files.length">
                  <template x-for="(f, idx) in files" :key="idx">
                    <div class="border rounded p-1">
                      <img :src="URL.createObjectURL(f)" class="w-full h-24 object-cover rounded">
                      <div class="text-xs text-gray-500 mt-1" x-text="f.name"></div>
                    </div>
                  </template>
                </div>
              </div>

              {{-- Fallback legacy: khi CHƯA có gallery, vẫn cho xoá ảnh cũ & xem preview --}}
              @if($existingImages->count() == 0)
                <div class="mt-2">
                  <img
                    src="{{ $product->image_url ?: asset('images/placeholder.png') }}"
                    alt="{{ $product->product_name ?: __('products.image_alt') }}"
                    style="max-height:120px">
                </div>

                <label class="inline-flex items-center gap-2 mt-2">
                  <input type="checkbox" name="remove_image" value="1" class="rounded" {{ old('remove_image') ? 'checked' : '' }}>
                  <span>{{ __('products.delete_current_image') }}</span>
                </label>
              @endif
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
              <label class="block text-sm mb-1">{{ __('products.size') }}</label>

              <button type="button" @click="open = !open"
                      class="w-full bg-white border border-gray-300 rounded px-3 py-2 flex items-center justify-between text-left text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-400">
                <span class="truncate" x-text="selected.length ? selected.join(', ') : '{{ __('products.fit_placeholder') }}'"></span>
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
              <label class="block text-sm mb-1">{{ __('products.color') }} ({{ __('products.color_placeholder') }})</label>
              <input name="spec_color" value="{{ old('spec_color', $specColorStr ?? '') }}" class="border rounded px-3 py-2 w-full" placeholder="Đen, Trắng, Be...">
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.fit') }} (phom)</label>
              <select name="spec_fit" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_fit', $specFit ?? '') ? '' : 'selected' }}>{{ __('products.fit_placeholder') }}</option>
                @foreach($fits as $fit)
                  <option value="{{ $fit }}" @selected(old('spec_fit', $specFit ?? '') === $fit)>{{ $fit }}</option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.brand') }}</label>
              <select name="spec_brand" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_brand', $specBrand ?? '') ? '' : 'selected' }}>{{ __('products.brand_placeholder') }}</option>
                @foreach($brands as $b)
                  <option value="{{ $b }}" @selected(old('spec_brand', $specBrand ?? '') === $b)>{{ $b }}</option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm mb-1">{{ __('products.material') }} (chất liệu)</label>
              <select name="spec_material" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_material', $specMaterial ?? '') ? '' : 'selected' }}>{{ __('products.material_placeholder') }}</option>
                @foreach($materials as $m)
                  <option value="{{ $m }}" @selected(old('spec_material', $specMaterial ?? '') === $m)>{{ $m }}</option>
                @endforeach
              </select>
            </div>

            <div class="sm:col-span-2 lg:col-span-3">
              <label class="block text-sm mb-1">{{ __('products.care') }} (hướng dẫn bảo quản)</label>
              <select name="spec_care" class="border rounded px-3 py-2 w-full" required>
                <option value="" disabled {{ old('spec_care', $specCare ?? '') ? '' : 'selected' }}>{{ __('products.care_placeholder') }}</option>
                @foreach($careOps as $c)
                  <option value="{{ $c }}" @selected(old('spec_care', $specCare ?? '') === $c)>{{ $c }}</option>
                @endforeach
              </select>
            </div>

            <div class="flex gap-3">
              <button class="inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest bg-gray-800 text-white hover:bg-gray-700">
                {{ __('products.update') }}
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

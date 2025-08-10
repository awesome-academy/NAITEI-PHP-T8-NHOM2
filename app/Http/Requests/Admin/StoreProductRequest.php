<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $sizesTop    = config('product_specs.sizes_top', []);
        $sizesBottom = config('product_specs.sizes_bottom', []);
        $sizes       = implode(',', array_unique(array_merge($sizesTop, $sizesBottom)));

        $fits        = implode(',', config('product_specs.fits', []));
        $brands      = implode(',', config('product_specs.brands', []));
        $materials   = implode(',', config('product_specs.materials', []));
        $care     = implode(',', config('product_specs.care', []));

        return [
            'categories_id'  => ['required','integer','exists:categories,categories_id'],
            'product_name'   => ['required','string','max:191'],
            'slug'           => ['nullable','string','max:255', Rule::unique('products','slug')->whereNull('deleted_at')],
            'description'    => ['nullable','string'],
            'product_price'  => ['required','numeric','min:0'],
            'stock_quantity' => ['required','integer','min:0'],
            'status'         => ['required','integer','in:0,1'],
            'image'          => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            // specs
            'spec_size'       => ['array'],
            "spec_size.*"     => ["in:$sizes"],
            'spec_color'      => ['nullable','string','max:255'],
            "spec_fit"        => ["nullable","in:$fits"],
            "spec_brand"      => ["nullable","in:$brands"],
            "spec_material"   => ["nullable","in:$materials"],
            "spec_care"       => ["nullable","in:$care"],
        ];
    }

    // nếu slug trống thì gen từ product_name
     protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('product_name')) {
            $this->merge(['slug' => Str::slug($this->input('product_name'))]);
        }
    }

    public function messages(): array
    {
        return [
            'categories_id.required' => 'Vui lòng chọn danh mục.',
            'categories_id.exists'   => 'Danh mục không hợp lệ.',
            'product_name.required'  => 'Tên sản phẩm là bắt buộc.',
            'slug.unique'            => 'Slug đã tồn tại.',
            'product_price.min'      => 'Giá không được âm.',
            'stock_quantity.min'     => 'Tồn kho không được âm.',
            'image.image'            => 'Ảnh không hợp lệ.',
        ];
    }
}

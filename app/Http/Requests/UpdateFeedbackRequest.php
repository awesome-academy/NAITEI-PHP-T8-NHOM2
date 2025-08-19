<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

     protected function prepareForValidation(): void
    {
        if ($this->has('rating')) {
            $this->merge(['rating' => (int) $this->input('rating')]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rating'  => ['required','integer','min:1','max:5'],
            'comment' => ['nullable','string','max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'rating.required' => 'Vui lòng chọn số sao.',
            'rating.min'      => 'Ít nhất 1 sao.',
            'rating.max'      => 'Tối đa 5 sao.',
            'comment.max'     => 'Bình luận tối đa 100 ký tự.',
        ];
    }
}

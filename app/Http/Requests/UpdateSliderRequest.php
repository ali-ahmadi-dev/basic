<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
              return [
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'link' => 'nullable|url',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

            public function messages(): array
    {
        return [
            
            'title.string' => 'عنوان باید یک متن معتبر باشد.',
            'title.max' => 'حداکثر طول عنوان 255 کاراکتر است.',
            'description.string' => 'توضیحات باید متن معتبر باشد.',
            'link.url' => 'لینک وارد شده معتبر نیست.',
            'image.image' => 'فایل انتخاب شده باید یک تصویر باشد.',
            'image.mimes' => 'فرمت تصویر باید jpg، jpeg، png یا webp باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از 2 مگابایت باشد.',
        ];
    }
}

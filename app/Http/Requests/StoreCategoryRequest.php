<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'unique:categories'],
            'parent_id' => ['required', 'exists:categories,id']
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'يرجي كتابة اسم القسم',
            'name.string' => 'اسم القسم يجب ان يكون نصا',
            'name.max' => 'لا يزيد اسم القسم عن 100 حرف',
            'name.unique' => 'هذا القسم موجود بالفعل ',
            'parent_id.required' => 'يرجي اختيار القسم الرئيسي',
            'parent_id.exists' => 'القسم المختار غير صحيح',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'اسم القسم',
            'parent_id' => 'القسم الرئيسي',
        ];
    }
}

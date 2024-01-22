<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'unique:posts'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'links.*' => ['required', 'url'],

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
            'title.required' => 'يبدو أنك قد نسيت كتابة عنوان المنشور',
            'title.string' => 'صيغة العنوان غير صحيحة ، العنوان يجب أن يكون نصا',
            'title.unique' => 'هذا العنوان موجود مسبقا',
            'category_id.requried' => 'يجب تحديد القسم',
            'category_id.exists' => 'القسم الذي اخترته غير صحيح',
            'image.required' => 'اضف صورة للمنشور',
            'image.image' => 'يبدو أن الملف المرفق ليس بصورة',
            'image.mimes' => 'الامتدادت المقبولة لصورة المقال: png, jpg, jpeg',
            'image.max' => 'يجب ألا تزيد حجم الصورة عن 2048 ميجا بيكسل',
            'links.*.required' => 'اضف رابط تحميل واحدا علي الأقل',
            'links.*.url' => 'عنوان الرابط غير صحيح',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}

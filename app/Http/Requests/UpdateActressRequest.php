<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActressRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'unique:actresses,name,' . $this->actress->id],
            'image' => ['nullable', 'sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'nationality' => ['nullable', 'sometimes', 'between:0,34'],
        ];
    }
}

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
            'title' => 'required',
            'desc' => 'required',
            'poster' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title' => 'title là bắt buộc',
            'desc' => 'desc là bắt buộc',
            'poster' => 'poster là bắt buộc',
            'content' => 'content là bắt buộc',
            'category_id' => 'category_id là bắt buộc'
        ];
    }
}

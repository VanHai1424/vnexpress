<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];
        
    }

    public function messages(): array
    {
        return [
            'name' => 'name là bắt buộc',
            'email' => 'email là bắt buộc',
            'password' => 'password là bắt buộc',
            'role' => 'role là bắt buộc',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            "user_name" => "required|string|min:6|unique:user,user_name",
            "email" => "required|email|unique:user,email",
            "password" => "required|string|confirmed|min:6",
            "user_gender" => "required",
            "year_of_birth" => "required|integer|lte:" . (date('Y') - 18),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEditUser extends FormRequest
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
        // dd($this->all());
        return [
            "user_id" => "required|string",
            "user_gender" => "required",
            "year_of_birth" => "required|integer|lte:" . (date('Y') - 18),
            "height" => "required|decimal:0,2|lte:215|gt:140",
            "user_image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "slogan" => "max:80",
            "hobbies"=>"required|max:100",
        ];
    }
}

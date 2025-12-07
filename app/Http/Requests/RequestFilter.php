<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFilter extends FormRequest
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
            "age_from" => "nullable|numeric|between:18,60",
            "age_to" => "nullable|numeric|between:18,60",
            "user_gender" => "required|string|in:Male,Female,All",
            "hobbies" => "nullable|string",
            "page" => "required|numeric|min:1"
        ];
    }
}

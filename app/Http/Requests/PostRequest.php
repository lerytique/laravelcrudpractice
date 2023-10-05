<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "content" => "required"
        ];
    }

    public function rulesForCreate(): array
    {
        return [
            "title" => "required|max:255",
            "content" => "required"
        ];
    }

    public function rulesForUpdate(): array
    {
        return [
            "title" => "required|max:255",
            "content" => "required"
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AtlasRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'area' => 'string|max:255',
            'region' => 'string|max:255',
            'suburb' => 'string|max:255',
            'size' => 'numeric|max:255',
            'page' => 'numeric|max:255',
        ];
    }
}

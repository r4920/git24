<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'code' => ['nullable', 'string', 'unique:patients,code'],
            'email' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}

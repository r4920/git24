<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnterpriseAPIRequest extends FormRequest
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
            'name' => ['string', 'required', 'unique:enterprises,name'],
            'email' => ['string', 'required', 'unique:enterprises,email'],
            'phone' => ['nullable', 'string'],
            'code' => ['string', 'required', 'min:3', 'unique:enterprises,code'],
            'address' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}

<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartmentsAPIRequest extends FormRequest
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
            'name' => ['string', 'required', 'unique:departments,name'],
            'code' => ['string', 'required', 'unique:departments,code'],
            'enterprise' => ['nullable', 'exists:enterprises,id'],
            'email' => ['nullable', 'string', 'unique:departments,email'],
            'phone' => ['nullable', 'string', 'unique:departments,phone'],
            'website' => ['nullable', 'string'],
            'address' => ['string', 'required', 'unique:departments,address'],
            'is_active' => ['boolean'],
        ];
    }
}

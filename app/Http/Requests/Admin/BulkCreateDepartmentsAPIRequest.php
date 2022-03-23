<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateDepartmentsAPIRequest extends FormRequest
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
            'data.*.name' => ['string', 'required', 'unique:departments,name'],
            'data.*.code' => ['string', 'required', 'unique:departments,code'],
            'data.*.enterprise' => ['nullable', 'exists:enterprises,id'],
            'data.*.email' => ['nullable', 'string', 'unique:departments,email'],
            'data.*.phone' => ['nullable', 'string', 'unique:departments,phone'],
            'data.*.website' => ['nullable', 'string'],
            'data.*.address' => ['string', 'required', 'unique:departments,address'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

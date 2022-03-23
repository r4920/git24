<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateEnterpriseAPIRequest extends FormRequest
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
            'data.*.name' => ['string', 'required', 'unique:enterprises,name'],
            'data.*.email' => ['string', 'required', 'unique:enterprises,email'],
            'data.*.phone' => ['nullable', 'string'],
            'data.*.code' => ['string', 'required', 'min:3', 'unique:enterprises,code'],
            'data.*.address' => ['nullable', 'string'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.website' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

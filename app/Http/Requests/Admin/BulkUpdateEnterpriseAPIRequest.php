<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateEnterpriseAPIRequest extends FormRequest
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
            'data.*.name' => ['string', 'required', 'unique:enterprises,name,'.$this->route('enterprise')],
            'data.*.email' => ['string', 'required', 'unique:enterprises,email,'.$this->route('enterprise')],
            'data.*.phone' => ['nullable', 'string'],
            'data.*.code' => ['string', 'required', 'min:3', 'unique:enterprises,code,'.$this->route('enterprise')],
            'data.*.address' => ['nullable', 'string'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.website' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

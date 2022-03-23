<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnterpriseAPIRequest extends FormRequest
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
            'name' => ['string', 'required', 'unique:enterprises,name,'.$this->route('enterprise')],
            'email' => ['string', 'required', 'unique:enterprises,email,'.$this->route('enterprise')],
            'phone' => ['nullable', 'string'],
            'code' => ['string', 'required', 'min:3', 'unique:enterprises,code,'.$this->route('enterprise')],
            'address' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}

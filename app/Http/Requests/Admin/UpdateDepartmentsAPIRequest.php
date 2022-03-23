<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentsAPIRequest extends FormRequest
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
            'name' => ['string', 'required', 'unique:departments,name,'.$this->route('departments')],
            'code' => ['string', 'required', 'unique:departments,code,'.$this->route('departments')],
            'enterprise' => ['nullable', 'exists:enterprises,id'],
            'email' => ['nullable', 'string', 'unique:departments,email,'.$this->route('departments')],
            'phone' => ['nullable', 'string', 'unique:departments,phone,'.$this->route('departments')],
            'website' => ['nullable', 'string'],
            'address' => ['string', 'required', 'unique:departments,address,'.$this->route('departments')],
            'is_active' => ['boolean'],
        ];
    }
}

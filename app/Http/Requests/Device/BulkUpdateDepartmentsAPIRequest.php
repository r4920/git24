<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateDepartmentsAPIRequest extends FormRequest
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
            'data.*.name' => ['string', 'required', 'unique:departments,name,'.$this->route('departments')],
            'data.*.code' => ['string', 'required', 'unique:departments,code,'.$this->route('departments')],
            'data.*.enterprise' => ['nullable', 'exists:enterprises,id'],
            'data.*.email' => ['nullable', 'string', 'unique:departments,email,'.$this->route('departments')],
            'data.*.phone' => ['nullable', 'string', 'unique:departments,phone,'.$this->route('departments')],
            'data.*.website' => ['nullable', 'string'],
            'data.*.address' => ['string', 'required', 'unique:departments,address,'.$this->route('departments')],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

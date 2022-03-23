<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdatePatientAPIRequest extends FormRequest
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
            'data.*.name' => ['nullable', 'string'],
            'data.*.code' => ['nullable', 'string', 'unique:patients,code,'.$this->route('patient')],
            'data.*.email' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

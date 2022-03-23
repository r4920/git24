<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateEncounterAPIRequest extends FormRequest
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
            'data.*.name' => ['string', 'required', 'unique:encounters,name,'.$this->route('encounter')],
            'data.*.date' => ['nullable'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.patient_id' => ['nullable', 'exists:patients,id'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

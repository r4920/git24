<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateEncounterAPIRequest extends FormRequest
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
            'name' => ['string', 'required', 'unique:encounters,name'],
            'date' => ['nullable'],
            'description' => ['nullable', 'string'],
            'patient_id' => ['nullable', 'exists:patients,id'],
            'is_active' => ['boolean'],
        ];
    }
}

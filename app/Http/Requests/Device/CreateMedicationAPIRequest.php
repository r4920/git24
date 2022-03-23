<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicationAPIRequest extends FormRequest
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
            'code' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'strength' => ['nullable', 'string'],
            'unit' => ['nullable', 'string'],
            'med_form' => ['nullable', 'string'],
            'mfg_name' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}

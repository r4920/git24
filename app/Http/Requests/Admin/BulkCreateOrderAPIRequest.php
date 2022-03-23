<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateOrderAPIRequest extends FormRequest
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
            'data.*.order_id' => ['nullable', 'string'],
            'data.*.patient_id' => ['nullable', 'exists:patients,id'],
            'data.*.status' => ['nullable', 'string'],
            'data.*.order_by' => ['nullable', 'exists:users,id'],
            'data.*.note' => ['nullable', 'string'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

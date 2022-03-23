<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'string'],
            'patient_id' => ['nullable', 'exists:patients,id'],
            'status' => ['nullable', 'string'],
            'order_by' => ['nullable', 'exists:users,id'],
            'note' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}

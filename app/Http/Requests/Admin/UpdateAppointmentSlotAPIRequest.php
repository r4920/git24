<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentSlotAPIRequest extends FormRequest
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
            'start_time' => ['nullable'],
            'end_time' => ['nullable'],
            'offset' => ['nullable', 'integer'],
            'applied_from' => ['nullable'],
            'applied_to' => ['nullable'],
            'user_id' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

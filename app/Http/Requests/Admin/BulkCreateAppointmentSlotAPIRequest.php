<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateAppointmentSlotAPIRequest extends FormRequest
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
            'data.*.start_time' => ['nullable'],
            'data.*.end_time' => ['nullable'],
            'data.*.offset' => ['nullable', 'integer'],
            'data.*.applied_from' => ['nullable'],
            'data.*.applied_to' => ['nullable'],
            'data.*.user_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

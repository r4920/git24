<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentScheduleAPIRequest extends FormRequest
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
            'slot' => ['nullable', 'integer'],
            'start_time' => ['nullable'],
            'end_time' => ['nullable'],
            'date' => ['nullable'],
            'offset' => ['nullable', 'integer'],
            'participant' => ['nullable', 'string'],
            'host' => ['nullable', 'integer'],
            'is_cancelled' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

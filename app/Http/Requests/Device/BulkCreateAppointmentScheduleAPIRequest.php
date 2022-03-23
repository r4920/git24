<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateAppointmentScheduleAPIRequest extends FormRequest
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
            'data.*.slot' => ['nullable', 'integer'],
            'data.*.start_time' => ['nullable'],
            'data.*.end_time' => ['nullable'],
            'data.*.date' => ['nullable'],
            'data.*.offset' => ['nullable', 'integer'],
            'data.*.participant' => ['nullable', 'string'],
            'data.*.host' => ['nullable', 'integer'],
            'data.*.is_cancelled' => ['nullable', 'boolean'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

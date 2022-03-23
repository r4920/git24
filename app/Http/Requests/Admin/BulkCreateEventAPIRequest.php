<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateEventAPIRequest extends FormRequest
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
            'data.*.description' => ['nullable', 'string'],
            'data.*.address_line1' => ['nullable', 'string'],
            'data.*.address_line2' => ['nullable', 'string'],
            'data.*.address_city' => ['nullable', 'string'],
            'data.*.address_country' => ['nullable', 'string'],
            'data.*.address_state' => ['nullable', 'string'],
            'data.*.address_pincode' => ['nullable', 'string'],
            'data.*.address_lat' => ['nullable', 'integer'],
            'data.*.address_lng' => ['nullable', 'integer'],
            'data.*.start_date_time' => ['nullable'],
            'data.*.end_date_time' => ['nullable'],
            'data.*.speakers_name' => ['nullable', 'string'],
            'data.*.speakers_image' => ['nullable', 'string'],
            'data.*.speakers_email' => ['nullable', 'string'],
            'data.*.organizer_name' => ['nullable', 'string'],
            'data.*.organizer_image' => ['nullable', 'string'],
            'data.*.organizer_email' => ['nullable', 'string'],
            'data.*.organizer_url' => ['nullable', 'string'],
            'data.*.image' => ['nullable', 'string'],
            'data.*.attachments' => ['nullable', 'string'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

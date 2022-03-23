<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventAPIRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'address_line1' => ['nullable', 'string'],
            'address_line2' => ['nullable', 'string'],
            'address_city' => ['nullable', 'string'],
            'address_country' => ['nullable', 'string'],
            'address_state' => ['nullable', 'string'],
            'address_pincode' => ['nullable', 'string'],
            'address_lat' => ['nullable', 'integer'],
            'address_lng' => ['nullable', 'integer'],
            'start_date_time' => ['nullable'],
            'end_date_time' => ['nullable'],
            'speakers_name' => ['nullable', 'string'],
            'speakers_image' => ['nullable', 'string'],
            'speakers_email' => ['nullable', 'string'],
            'organizer_name' => ['nullable', 'string'],
            'organizer_image' => ['nullable', 'string'],
            'organizer_email' => ['nullable', 'string'],
            'organizer_url' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'attachments' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

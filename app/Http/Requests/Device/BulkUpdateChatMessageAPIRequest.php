<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateChatMessageAPIRequest extends FormRequest
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
            'data.*.message' => ['string', 'required'],
            'data.*.sender' => ['string', 'required'],
            'data.*.recipient' => ['string', 'required'],
            'data.*.group_id' => ['nullable', 'integer'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateChatGroupAPIRequest extends FormRequest
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
            'data.*.name' => ['string', 'required'],
            'data.*.code' => ['string', 'required'],
            'data.*.member' => ['nullable', 'string'],
            'data.*.admin' => ['string', 'required'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

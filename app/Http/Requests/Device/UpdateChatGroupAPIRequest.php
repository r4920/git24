<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatGroupAPIRequest extends FormRequest
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
            'name' => ['string', 'required'],
            'code' => ['string', 'required'],
            'member' => ['nullable', 'string'],
            'admin' => ['string', 'required'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

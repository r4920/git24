<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatGroupAPIRequest extends FormRequest
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

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteAPIRequest extends FormRequest
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
            'encounter_id' => ['nullable', 'exists:encounters,id'],
            'provider' => ['nullable', 'exists:users,id'],
            'text' => ['string', 'required', 'unique:notes,text'],
            'is_active' => ['boolean'],
        ];
    }
}

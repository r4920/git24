<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteAPIRequest extends FormRequest
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
            'text' => ['string', 'required', 'unique:notes,text,'.$this->route('note')],
            'is_active' => ['boolean'],
        ];
    }
}

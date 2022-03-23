<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateNoteAPIRequest extends FormRequest
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
            'data.*.encounter_id' => ['nullable', 'exists:encounters,id'],
            'data.*.provider' => ['nullable', 'exists:users,id'],
            'data.*.text' => ['string', 'required', 'unique:notes,text,'.$this->route('note')],
            'data.*.is_active' => ['boolean'],
        ];
    }
}

<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskAPIRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'attachments' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],
            'date' => ['nullable'],
            'due_date' => ['nullable'],
            'completed_by' => ['nullable', 'integer'],
            'completed_at' => ['nullable'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

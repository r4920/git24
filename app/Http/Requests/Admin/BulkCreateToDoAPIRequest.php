<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateToDoAPIRequest extends FormRequest
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
            'data.*.date' => ['nullable'],
            'data.*.due_date' => ['nullable'],
            'data.*.is_completed' => ['nullable', 'boolean'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

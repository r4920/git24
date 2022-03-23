<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateTaskAPIRequest extends FormRequest
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
            'data.*.title' => ['nullable', 'string'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.attachments' => ['nullable', 'string'],
            'data.*.status' => ['nullable', 'integer'],
            'data.*.date' => ['nullable'],
            'data.*.due_date' => ['nullable'],
            'data.*.completed_by' => ['nullable', 'integer'],
            'data.*.completed_at' => ['nullable'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

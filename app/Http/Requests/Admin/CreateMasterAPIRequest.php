<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateMasterAPIRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'code' => ['nullable', 'string'],
            'group' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'sequence' => ['nullable', 'integer'],
            'image' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'integer'],
            'parent_code' => ['nullable', 'boolean'],
            'is_default' => ['boolean'],
            'is_deleted' => ['boolean'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

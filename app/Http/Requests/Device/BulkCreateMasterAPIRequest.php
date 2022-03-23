<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateMasterAPIRequest extends FormRequest
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
            'data.*.slug' => ['nullable', 'string'],
            'data.*.code' => ['nullable', 'string'],
            'data.*.group' => ['nullable', 'string'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.sequence' => ['nullable', 'integer'],
            'data.*.image' => ['nullable', 'string'],
            'data.*.parent_id' => ['nullable', 'integer'],
            'data.*.parent_code' => ['nullable', 'boolean'],
            'data.*.is_default' => ['boolean'],
            'data.*.is_deleted' => ['boolean'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

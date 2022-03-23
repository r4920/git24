<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderItemAPIRequest extends FormRequest
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
            'order_id' => ['nullable', 'string'],
            'item' => ['nullable', 'string'],
            'uom' => ['nullable', 'string'],
            'qty' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}

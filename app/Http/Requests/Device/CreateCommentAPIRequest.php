<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentAPIRequest extends FormRequest
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
            'comment' => ['nullable', 'string'],
            'upvote_count' => ['nullable', 'integer'],
            'downvote_count' => ['nullable', 'integer'],
            'comment_time' => ['nullable'],
            'parent_item' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}

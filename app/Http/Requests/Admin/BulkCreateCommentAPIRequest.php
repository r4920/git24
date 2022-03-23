<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkCreateCommentAPIRequest extends FormRequest
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
            'data.*.comment' => ['nullable', 'string'],
            'data.*.upvote_count' => ['nullable', 'integer'],
            'data.*.downvote_count' => ['nullable', 'integer'],
            'data.*.comment_time' => ['nullable'],
            'data.*.parent_item' => ['nullable', 'integer'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}

<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Comment extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var string[]
     */
    protected $fillable = [
        'comment',
        'upvote_count',
        'downvote_count',
        'comment_time',
        'parent_item',
        'is_active',
        'created_at',
        'updated_at',
        'updated_by',
        'added_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'comment' => 'string',
        'upvote_count' => 'integer',
        'downvote_count' => 'integer',
        'comment_time' => 'datetime',
        'parent_item' => 'integer',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

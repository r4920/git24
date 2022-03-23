<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ChatMessage extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'chat_messages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'message',
        'sender',
        'recipient',
        'group_id',
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
        'message' => 'string',
        'sender' => 'string',
        'recipient' => 'string',
        'group_id' => 'integer',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

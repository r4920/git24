<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ChatGroup extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'chat_groups';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code',
        'member',
        'admin',
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
        'name' => 'string',
        'code' => 'string',
        'member' => 'string',
        'admin' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

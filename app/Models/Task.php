<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Task extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'attachments',
        'status',
        'date',
        'due_date',
        'completed_by',
        'completed_at',
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
        'title' => 'string',
        'description' => 'string',
        'attachments' => 'string',
        'status' => 'integer',
        'date' => 'datetime',
        'due_date' => 'datetime',
        'completed_by' => 'integer',
        'completed_at' => 'datetime',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

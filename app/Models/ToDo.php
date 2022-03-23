<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class ToDo extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'to_dos';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'date',
        'due_date',
        'is_completed',
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
        'description' => 'string',
        'date' => 'datetime',
        'due_date' => 'datetime',
        'is_completed' => 'boolean',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

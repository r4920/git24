<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Master extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'masters';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'code',
        'group',
        'description',
        'sequence',
        'image',
        'parent_id',
        'parent_code',
        'is_default',
        'is_deleted',
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
        'slug' => 'string',
        'code' => 'string',
        'group' => 'string',
        'description' => 'string',
        'sequence' => 'integer',
        'image' => 'string',
        'parent_id' => 'integer',
        'parent_code' => 'boolean',
        'is_default' => 'boolean',
        'is_deleted' => 'boolean',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

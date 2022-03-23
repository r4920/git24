<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Medication extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'medications';

    /**
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'strength',
        'unit',
        'med_form',
        'mfg_name',
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
        'code' => 'string',
        'name' => 'string',
        'strength' => 'string',
        'unit' => 'string',
        'med_form' => 'string',
        'mfg_name' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

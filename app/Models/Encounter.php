<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Encounter extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'encounters';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'date',
        'description',
        'patient_id',
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
        'date' => 'datetime',
        'description' => 'string',
        'patient_id' => 'integer',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function note()
    {
        return $this->belongsTo(Note::class, 'encounter_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}

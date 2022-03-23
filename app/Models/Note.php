<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Note extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'notes';

    /**
     * @var string[]
     */
    protected $fillable = [
        'encounter_id',
        'provider',
        'text',
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
        'encounter_id' => 'integer',
        'provider' => 'integer',
        'text' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function encounter()
    {
        return $this->hasOne(Encounter::class, 'id', 'encounter_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'provider');
    }
}

<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class AppointmentSlot extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'appointment_slots';

    /**
     * @var string[]
     */
    protected $fillable = [
        'start_time',
        'end_time',
        'offset',
        'applied_from',
        'applied_to',
        'user_id',
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
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'offset' => 'integer',
        'applied_from' => 'datetime',
        'applied_to' => 'datetime',
        'user_id' => 'integer',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

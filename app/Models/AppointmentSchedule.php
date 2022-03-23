<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class AppointmentSchedule extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'appointment_schedules';

    /**
     * @var string[]
     */
    protected $fillable = [
        'slot',
        'start_time',
        'end_time',
        'date',
        'offset',
        'participant',
        'host',
        'is_cancelled',
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
        'slot' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'date' => 'datetime',
        'offset' => 'integer',
        'participant' => 'string',
        'host' => 'integer',
        'is_cancelled' => 'boolean',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

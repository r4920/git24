<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Event extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'address_line1',
        'address_line2',
        'address_city',
        'address_country',
        'address_state',
        'address_pincode',
        'address_lat',
        'address_lng',
        'start_date_time',
        'end_date_time',
        'speakers_name',
        'speakers_image',
        'speakers_email',
        'organizer_name',
        'organizer_image',
        'organizer_email',
        'organizer_url',
        'image',
        'attachments',
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
        'address_line1' => 'string',
        'address_line2' => 'string',
        'address_city' => 'string',
        'address_country' => 'string',
        'address_state' => 'string',
        'address_pincode' => 'string',
        'address_lat' => 'integer',
        'address_lng' => 'integer',
        'start_date_time' => 'datetime',
        'end_date_time' => 'datetime',
        'speakers_name' => 'string',
        'speakers_image' => 'string',
        'speakers_email' => 'string',
        'organizer_name' => 'string',
        'organizer_image' => 'string',
        'organizer_email' => 'string',
        'organizer_url' => 'string',
        'image' => 'string',
        'attachments' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}

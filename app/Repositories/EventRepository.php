<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return Event::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}

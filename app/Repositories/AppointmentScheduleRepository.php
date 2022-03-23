<?php

namespace App\Repositories;

use App\Models\AppointmentSchedule;

class AppointmentScheduleRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
        return AppointmentSchedule::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}

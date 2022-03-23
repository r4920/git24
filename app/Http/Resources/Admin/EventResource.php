<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class EventResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address_line1' => $this->address_line1,
            'address_line2' => $this->address_line2,
            'address_city' => $this->address_city,
            'address_country' => $this->address_country,
            'address_state' => $this->address_state,
            'address_pincode' => $this->address_pincode,
            'address_lat' => $this->address_lat,
            'address_lng' => $this->address_lng,
            'start_date_time' => $this->start_date_time,
            'end_date_time' => $this->end_date_time,
            'speakers_name' => $this->speakers_name,
            'speakers_image' => $this->speakers_image,
            'speakers_email' => $this->speakers_email,
            'organizer_name' => $this->organizer_name,
            'organizer_image' => $this->organizer_image,
            'organizer_email' => $this->organizer_email,
            'organizer_url' => $this->organizer_url,
            'image' => $this->image,
            'attachments' => $this->attachments,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'added_by' => $this->added_by,
        ];
    }
}

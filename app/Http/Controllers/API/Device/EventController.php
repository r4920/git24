<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateEventAPIRequest;
use App\Http\Requests\Device\BulkUpdateEventAPIRequest;
use App\Http\Requests\Device\CreateEventAPIRequest;
use App\Http\Requests\Device\UpdateEventAPIRequest;
use App\Http\Resources\Device\EventCollection;
use App\Http\Resources\Device\EventResource;
use App\Repositories\EventRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class EventController extends AppBaseController
{
    /**
     * @var EventRepository
     */
    private EventRepository $eventRepository;

    /**
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Event's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return EventCollection
     */
    public function index(Request $request): EventCollection
    {
        $events = $this->eventRepository->fetch($request);

        return new EventCollection($events);
    }

    /**
     * Create Event with given payload.
     *
     * @param CreateEventAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EventResource
     */
    public function store(CreateEventAPIRequest $request): EventResource
    {
        $input = $request->all();
        $event = $this->eventRepository->create($input);

        return new EventResource($event);
    }

    /**
     * Get single Event record.
     *
     * @param int $id
     *
     * @return EventResource
     */
    public function show(int $id): EventResource
    {
        $event = $this->eventRepository->findOrFail($id);

        return new EventResource($event);
    }

    /**
     * Update Event with given payload.
     *
     * @param UpdateEventAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return EventResource
     */
    public function update(UpdateEventAPIRequest $request, int $id): EventResource
    {
        $input = $request->all();
        $event = $this->eventRepository->update($input, $id);

        return new EventResource($event);
    }

    /**
     * Delete given Event.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->eventRepository->delete($id);

        return $this->successResponse('Event deleted successfully.');
    }

    /**
     * Bulk create Event's.
     *
     * @param BulkCreateEventAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EventCollection
     */
    public function bulkStore(BulkCreateEventAPIRequest $request): EventCollection
    {
        $events = collect();

        $input = $request->get('data');
        foreach ($input as $key => $eventInput) {
            $events[$key] = $this->eventRepository->create($eventInput);
        }

        return new EventCollection($events);
    }

    /**
     * Bulk update Event's data.
     *
     * @param BulkUpdateEventAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EventCollection
     */
    public function bulkUpdate(BulkUpdateEventAPIRequest $request): EventCollection
    {
        $events = collect();

        $input = $request->get('data');
        foreach ($input as $key => $eventInput) {
            $events[$key] = $this->eventRepository->update($eventInput, $eventInput['id']);
        }

        return new EventCollection($events);
    }
}

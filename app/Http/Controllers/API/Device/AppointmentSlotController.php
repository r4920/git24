<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateAppointmentSlotAPIRequest;
use App\Http\Requests\Device\BulkUpdateAppointmentSlotAPIRequest;
use App\Http\Requests\Device\CreateAppointmentSlotAPIRequest;
use App\Http\Requests\Device\UpdateAppointmentSlotAPIRequest;
use App\Http\Resources\Device\AppointmentSlotCollection;
use App\Http\Resources\Device\AppointmentSlotResource;
use App\Repositories\AppointmentSlotRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class AppointmentSlotController extends AppBaseController
{
    /**
     * @var AppointmentSlotRepository
     */
    private AppointmentSlotRepository $appointmentSlotRepository;

    /**
     * @param AppointmentSlotRepository $appointmentSlotRepository
     */
    public function __construct(AppointmentSlotRepository $appointmentSlotRepository)
    {
        $this->appointmentSlotRepository = $appointmentSlotRepository;
    }

    /**
     * AppointmentSlot's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return AppointmentSlotCollection
     */
    public function index(Request $request): AppointmentSlotCollection
    {
        $appointmentSlots = $this->appointmentSlotRepository->fetch($request);

        return new AppointmentSlotCollection($appointmentSlots);
    }

    /**
     * Create AppointmentSlot with given payload.
     *
     * @param CreateAppointmentSlotAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppointmentSlotResource
     */
    public function store(CreateAppointmentSlotAPIRequest $request): AppointmentSlotResource
    {
        $input = $request->all();
        $appointmentSlot = $this->appointmentSlotRepository->create($input);

        return new AppointmentSlotResource($appointmentSlot);
    }

    /**
     * Get single AppointmentSlot record.
     *
     * @param int $id
     *
     * @return AppointmentSlotResource
     */
    public function show(int $id): AppointmentSlotResource
    {
        $appointmentSlot = $this->appointmentSlotRepository->findOrFail($id);

        return new AppointmentSlotResource($appointmentSlot);
    }

    /**
     * Update AppointmentSlot with given payload.
     *
     * @param UpdateAppointmentSlotAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return AppointmentSlotResource
     */
    public function update(UpdateAppointmentSlotAPIRequest $request, int $id): AppointmentSlotResource
    {
        $input = $request->all();
        $appointmentSlot = $this->appointmentSlotRepository->update($input, $id);

        return new AppointmentSlotResource($appointmentSlot);
    }

    /**
     * Delete given AppointmentSlot.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->appointmentSlotRepository->delete($id);

        return $this->successResponse('AppointmentSlot deleted successfully.');
    }

    /**
     * Bulk create AppointmentSlot's.
     *
     * @param BulkCreateAppointmentSlotAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppointmentSlotCollection
     */
    public function bulkStore(BulkCreateAppointmentSlotAPIRequest $request): AppointmentSlotCollection
    {
        $appointmentSlots = collect();

        $input = $request->get('data');
        foreach ($input as $key => $appointmentSlotInput) {
            $appointmentSlots[$key] = $this->appointmentSlotRepository->create($appointmentSlotInput);
        }

        return new AppointmentSlotCollection($appointmentSlots);
    }

    /**
     * Bulk update AppointmentSlot's data.
     *
     * @param BulkUpdateAppointmentSlotAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppointmentSlotCollection
     */
    public function bulkUpdate(BulkUpdateAppointmentSlotAPIRequest $request): AppointmentSlotCollection
    {
        $appointmentSlots = collect();

        $input = $request->get('data');
        foreach ($input as $key => $appointmentSlotInput) {
            $appointmentSlots[$key] = $this->appointmentSlotRepository->update($appointmentSlotInput, $appointmentSlotInput['id']);
        }

        return new AppointmentSlotCollection($appointmentSlots);
    }
}

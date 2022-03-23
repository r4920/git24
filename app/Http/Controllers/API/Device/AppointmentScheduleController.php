<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateAppointmentScheduleAPIRequest;
use App\Http\Requests\Device\BulkUpdateAppointmentScheduleAPIRequest;
use App\Http\Requests\Device\CreateAppointmentScheduleAPIRequest;
use App\Http\Requests\Device\UpdateAppointmentScheduleAPIRequest;
use App\Http\Resources\Device\AppointmentScheduleCollection;
use App\Http\Resources\Device\AppointmentScheduleResource;
use App\Repositories\AppointmentScheduleRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class AppointmentScheduleController extends AppBaseController
{
    /**
     * @var AppointmentScheduleRepository
     */
    private AppointmentScheduleRepository $appointmentScheduleRepository;

    /**
     * @param AppointmentScheduleRepository $appointmentScheduleRepository
     */
    public function __construct(AppointmentScheduleRepository $appointmentScheduleRepository)
    {
        $this->appointmentScheduleRepository = $appointmentScheduleRepository;
    }

    /**
     * AppointmentSchedule's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return AppointmentScheduleCollection
     */
    public function index(Request $request): AppointmentScheduleCollection
    {
        $appointmentSchedules = $this->appointmentScheduleRepository->fetch($request);

        return new AppointmentScheduleCollection($appointmentSchedules);
    }

    /**
     * Create AppointmentSchedule with given payload.
     *
     * @param CreateAppointmentScheduleAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppointmentScheduleResource
     */
    public function store(CreateAppointmentScheduleAPIRequest $request): AppointmentScheduleResource
    {
        $input = $request->all();
        $appointmentSchedule = $this->appointmentScheduleRepository->create($input);

        return new AppointmentScheduleResource($appointmentSchedule);
    }

    /**
     * Get single AppointmentSchedule record.
     *
     * @param int $id
     *
     * @return AppointmentScheduleResource
     */
    public function show(int $id): AppointmentScheduleResource
    {
        $appointmentSchedule = $this->appointmentScheduleRepository->findOrFail($id);

        return new AppointmentScheduleResource($appointmentSchedule);
    }

    /**
     * Update AppointmentSchedule with given payload.
     *
     * @param UpdateAppointmentScheduleAPIRequest $request
     * @param int                                 $id
     *
     * @throws ValidatorException
     *
     * @return AppointmentScheduleResource
     */
    public function update(UpdateAppointmentScheduleAPIRequest $request, int $id): AppointmentScheduleResource
    {
        $input = $request->all();
        $appointmentSchedule = $this->appointmentScheduleRepository->update($input, $id);

        return new AppointmentScheduleResource($appointmentSchedule);
    }

    /**
     * Delete given AppointmentSchedule.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->appointmentScheduleRepository->delete($id);

        return $this->successResponse('AppointmentSchedule deleted successfully.');
    }

    /**
     * Bulk create AppointmentSchedule's.
     *
     * @param BulkCreateAppointmentScheduleAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppointmentScheduleCollection
     */
    public function bulkStore(BulkCreateAppointmentScheduleAPIRequest $request): AppointmentScheduleCollection
    {
        $appointmentSchedules = collect();

        $input = $request->get('data');
        foreach ($input as $key => $appointmentScheduleInput) {
            $appointmentSchedules[$key] = $this->appointmentScheduleRepository->create($appointmentScheduleInput);
        }

        return new AppointmentScheduleCollection($appointmentSchedules);
    }

    /**
     * Bulk update AppointmentSchedule's data.
     *
     * @param BulkUpdateAppointmentScheduleAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AppointmentScheduleCollection
     */
    public function bulkUpdate(BulkUpdateAppointmentScheduleAPIRequest $request): AppointmentScheduleCollection
    {
        $appointmentSchedules = collect();

        $input = $request->get('data');
        foreach ($input as $key => $appointmentScheduleInput) {
            $appointmentSchedules[$key] = $this->appointmentScheduleRepository->update($appointmentScheduleInput, $appointmentScheduleInput['id']);
        }

        return new AppointmentScheduleCollection($appointmentSchedules);
    }
}

<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreatePatientAPIRequest;
use App\Http\Requests\Device\BulkUpdatePatientAPIRequest;
use App\Http\Requests\Device\CreatePatientAPIRequest;
use App\Http\Requests\Device\UpdatePatientAPIRequest;
use App\Http\Resources\Device\PatientCollection;
use App\Http\Resources\Device\PatientResource;
use App\Repositories\PatientRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class PatientController extends AppBaseController
{
    /**
     * @var PatientRepository
     */
    private PatientRepository $patientRepository;

    /**
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * Patient's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return PatientCollection
     */
    public function index(Request $request): PatientCollection
    {
        $patients = $this->patientRepository->fetch($request);

        return new PatientCollection($patients);
    }

    /**
     * Create Patient with given payload.
     *
     * @param CreatePatientAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PatientResource
     */
    public function store(CreatePatientAPIRequest $request): PatientResource
    {
        $input = $request->all();
        $patient = $this->patientRepository->create($input);

        return new PatientResource($patient);
    }

    /**
     * Get single Patient record.
     *
     * @param int $id
     *
     * @return PatientResource
     */
    public function show(int $id): PatientResource
    {
        $patient = $this->patientRepository->findOrFail($id);

        return new PatientResource($patient);
    }

    /**
     * Update Patient with given payload.
     *
     * @param UpdatePatientAPIRequest $request
     * @param int                     $id
     *
     * @throws ValidatorException
     *
     * @return PatientResource
     */
    public function update(UpdatePatientAPIRequest $request, int $id): PatientResource
    {
        $input = $request->all();
        $patient = $this->patientRepository->update($input, $id);

        return new PatientResource($patient);
    }

    /**
     * Delete given Patient.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->patientRepository->delete($id);

        return $this->successResponse('Patient deleted successfully.');
    }

    /**
     * Bulk create Patient's.
     *
     * @param BulkCreatePatientAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PatientCollection
     */
    public function bulkStore(BulkCreatePatientAPIRequest $request): PatientCollection
    {
        $patients = collect();

        $input = $request->get('data');
        foreach ($input as $key => $patientInput) {
            $patients[$key] = $this->patientRepository->create($patientInput);
        }

        return new PatientCollection($patients);
    }

    /**
     * Bulk update Patient's data.
     *
     * @param BulkUpdatePatientAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return PatientCollection
     */
    public function bulkUpdate(BulkUpdatePatientAPIRequest $request): PatientCollection
    {
        $patients = collect();

        $input = $request->get('data');
        foreach ($input as $key => $patientInput) {
            $patients[$key] = $this->patientRepository->update($patientInput, $patientInput['id']);
        }

        return new PatientCollection($patients);
    }
}

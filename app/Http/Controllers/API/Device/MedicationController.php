<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateMedicationAPIRequest;
use App\Http\Requests\Device\BulkUpdateMedicationAPIRequest;
use App\Http\Requests\Device\CreateMedicationAPIRequest;
use App\Http\Requests\Device\UpdateMedicationAPIRequest;
use App\Http\Resources\Device\MedicationCollection;
use App\Http\Resources\Device\MedicationResource;
use App\Repositories\MedicationRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MedicationController extends AppBaseController
{
    /**
     * @var MedicationRepository
     */
    private MedicationRepository $medicationRepository;

    /**
     * @param MedicationRepository $medicationRepository
     */
    public function __construct(MedicationRepository $medicationRepository)
    {
        $this->medicationRepository = $medicationRepository;
    }

    /**
     * Medication's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MedicationCollection
     */
    public function index(Request $request): MedicationCollection
    {
        $medications = $this->medicationRepository->fetch($request);

        return new MedicationCollection($medications);
    }

    /**
     * Create Medication with given payload.
     *
     * @param CreateMedicationAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MedicationResource
     */
    public function store(CreateMedicationAPIRequest $request): MedicationResource
    {
        $input = $request->all();
        $medication = $this->medicationRepository->create($input);

        return new MedicationResource($medication);
    }

    /**
     * Get single Medication record.
     *
     * @param int $id
     *
     * @return MedicationResource
     */
    public function show(int $id): MedicationResource
    {
        $medication = $this->medicationRepository->findOrFail($id);

        return new MedicationResource($medication);
    }

    /**
     * Update Medication with given payload.
     *
     * @param UpdateMedicationAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return MedicationResource
     */
    public function update(UpdateMedicationAPIRequest $request, int $id): MedicationResource
    {
        $input = $request->all();
        $medication = $this->medicationRepository->update($input, $id);

        return new MedicationResource($medication);
    }

    /**
     * Delete given Medication.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->medicationRepository->delete($id);

        return $this->successResponse('Medication deleted successfully.');
    }

    /**
     * Bulk create Medication's.
     *
     * @param BulkCreateMedicationAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MedicationCollection
     */
    public function bulkStore(BulkCreateMedicationAPIRequest $request): MedicationCollection
    {
        $medications = collect();

        $input = $request->get('data');
        foreach ($input as $key => $medicationInput) {
            $medications[$key] = $this->medicationRepository->create($medicationInput);
        }

        return new MedicationCollection($medications);
    }

    /**
     * Bulk update Medication's data.
     *
     * @param BulkUpdateMedicationAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MedicationCollection
     */
    public function bulkUpdate(BulkUpdateMedicationAPIRequest $request): MedicationCollection
    {
        $medications = collect();

        $input = $request->get('data');
        foreach ($input as $key => $medicationInput) {
            $medications[$key] = $this->medicationRepository->update($medicationInput, $medicationInput['id']);
        }

        return new MedicationCollection($medications);
    }
}

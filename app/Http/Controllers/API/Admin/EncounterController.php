<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateEncounterAPIRequest;
use App\Http\Requests\Admin\BulkUpdateEncounterAPIRequest;
use App\Http\Requests\Admin\CreateEncounterAPIRequest;
use App\Http\Requests\Admin\UpdateEncounterAPIRequest;
use App\Http\Resources\Admin\EncounterCollection;
use App\Http\Resources\Admin\EncounterResource;
use App\Repositories\EncounterRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class EncounterController extends AppBaseController
{
    /**
     * @var EncounterRepository
     */
    private EncounterRepository $encounterRepository;

    /**
     * @param EncounterRepository $encounterRepository
     */
    public function __construct(EncounterRepository $encounterRepository)
    {
        $this->encounterRepository = $encounterRepository;
    }

    /**
     * Encounter's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return EncounterCollection
     */
    public function index(Request $request): EncounterCollection
    {
        $encounters = $this->encounterRepository->fetch($request);

        return new EncounterCollection($encounters);
    }

    /**
     * Create Encounter with given payload.
     *
     * @param CreateEncounterAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EncounterResource
     */
    public function store(CreateEncounterAPIRequest $request): EncounterResource
    {
        $input = $request->all();
        $encounter = $this->encounterRepository->create($input);

        return new EncounterResource($encounter);
    }

    /**
     * Get single Encounter record.
     *
     * @param int $id
     *
     * @return EncounterResource
     */
    public function show(int $id): EncounterResource
    {
        $encounter = $this->encounterRepository->findOrFail($id);

        return new EncounterResource($encounter);
    }

    /**
     * Update Encounter with given payload.
     *
     * @param UpdateEncounterAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return EncounterResource
     */
    public function update(UpdateEncounterAPIRequest $request, int $id): EncounterResource
    {
        $input = $request->all();
        $encounter = $this->encounterRepository->update($input, $id);

        return new EncounterResource($encounter);
    }

    /**
     * Delete given Encounter.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->encounterRepository->delete($id);

        return $this->successResponse('Encounter deleted successfully.');
    }

    /**
     * Bulk create Encounter's.
     *
     * @param BulkCreateEncounterAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EncounterCollection
     */
    public function bulkStore(BulkCreateEncounterAPIRequest $request): EncounterCollection
    {
        $encounters = collect();

        $input = $request->get('data');
        foreach ($input as $key => $encounterInput) {
            $encounters[$key] = $this->encounterRepository->create($encounterInput);
        }

        return new EncounterCollection($encounters);
    }

    /**
     * Bulk update Encounter's data.
     *
     * @param BulkUpdateEncounterAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EncounterCollection
     */
    public function bulkUpdate(BulkUpdateEncounterAPIRequest $request): EncounterCollection
    {
        $encounters = collect();

        $input = $request->get('data');
        foreach ($input as $key => $encounterInput) {
            $encounters[$key] = $this->encounterRepository->update($encounterInput, $encounterInput['id']);
        }

        return new EncounterCollection($encounters);
    }
}

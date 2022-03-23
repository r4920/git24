<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateDepartmentsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateDepartmentsAPIRequest;
use App\Http\Requests\Admin\CreateDepartmentsAPIRequest;
use App\Http\Requests\Admin\UpdateDepartmentsAPIRequest;
use App\Http\Resources\Admin\DepartmentsCollection;
use App\Http\Resources\Admin\DepartmentsResource;
use App\Repositories\DepartmentsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class DepartmentsController extends AppBaseController
{
    /**
     * @var DepartmentsRepository
     */
    private DepartmentsRepository $departmentsRepository;

    /**
     * @param DepartmentsRepository $departmentsRepository
     */
    public function __construct(DepartmentsRepository $departmentsRepository)
    {
        $this->departmentsRepository = $departmentsRepository;
    }

    /**
     * Departments's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return DepartmentsCollection
     */
    public function index(Request $request): DepartmentsCollection
    {
        $departments = $this->departmentsRepository->fetch($request);

        return new DepartmentsCollection($departments);
    }

    /**
     * Create Departments with given payload.
     *
     * @param CreateDepartmentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DepartmentsResource
     */
    public function store(CreateDepartmentsAPIRequest $request): DepartmentsResource
    {
        $input = $request->all();
        $departments = $this->departmentsRepository->create($input);

        return new DepartmentsResource($departments);
    }

    /**
     * Get single Departments record.
     *
     * @param int $id
     *
     * @return DepartmentsResource
     */
    public function show(int $id): DepartmentsResource
    {
        $departments = $this->departmentsRepository->findOrFail($id);

        return new DepartmentsResource($departments);
    }

    /**
     * Update Departments with given payload.
     *
     * @param UpdateDepartmentsAPIRequest $request
     * @param int                         $id
     *
     * @throws ValidatorException
     *
     * @return DepartmentsResource
     */
    public function update(UpdateDepartmentsAPIRequest $request, int $id): DepartmentsResource
    {
        $input = $request->all();
        $departments = $this->departmentsRepository->update($input, $id);

        return new DepartmentsResource($departments);
    }

    /**
     * Delete given Departments.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->departmentsRepository->delete($id);

        return $this->successResponse('Departments deleted successfully.');
    }

    /**
     * Bulk create Departments's.
     *
     * @param BulkCreateDepartmentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DepartmentsCollection
     */
    public function bulkStore(BulkCreateDepartmentsAPIRequest $request): DepartmentsCollection
    {
        $departments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $departmentsInput) {
            $departments[$key] = $this->departmentsRepository->create($departmentsInput);
        }

        return new DepartmentsCollection($departments);
    }

    /**
     * Bulk update Departments's data.
     *
     * @param BulkUpdateDepartmentsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return DepartmentsCollection
     */
    public function bulkUpdate(BulkUpdateDepartmentsAPIRequest $request): DepartmentsCollection
    {
        $departments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $departmentsInput) {
            $departments[$key] = $this->departmentsRepository->update($departmentsInput, $departmentsInput['id']);
        }

        return new DepartmentsCollection($departments);
    }
}

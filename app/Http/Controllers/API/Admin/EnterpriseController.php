<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateEnterpriseAPIRequest;
use App\Http\Requests\Admin\BulkUpdateEnterpriseAPIRequest;
use App\Http\Requests\Admin\CreateEnterpriseAPIRequest;
use App\Http\Requests\Admin\UpdateEnterpriseAPIRequest;
use App\Http\Resources\Admin\EnterpriseCollection;
use App\Http\Resources\Admin\EnterpriseResource;
use App\Repositories\EnterpriseRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class EnterpriseController extends AppBaseController
{
    /**
     * @var EnterpriseRepository
     */
    private EnterpriseRepository $enterpriseRepository;

    /**
     * @param EnterpriseRepository $enterpriseRepository
     */
    public function __construct(EnterpriseRepository $enterpriseRepository)
    {
        $this->enterpriseRepository = $enterpriseRepository;
    }

    /**
     * Enterprise's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return EnterpriseCollection
     */
    public function index(Request $request): EnterpriseCollection
    {
        $enterprises = $this->enterpriseRepository->fetch($request);

        return new EnterpriseCollection($enterprises);
    }

    /**
     * Create Enterprise with given payload.
     *
     * @param CreateEnterpriseAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EnterpriseResource
     */
    public function store(CreateEnterpriseAPIRequest $request): EnterpriseResource
    {
        $input = $request->all();
        $enterprise = $this->enterpriseRepository->create($input);

        return new EnterpriseResource($enterprise);
    }

    /**
     * Get single Enterprise record.
     *
     * @param int $id
     *
     * @return EnterpriseResource
     */
    public function show(int $id): EnterpriseResource
    {
        $enterprise = $this->enterpriseRepository->findOrFail($id);

        return new EnterpriseResource($enterprise);
    }

    /**
     * Update Enterprise with given payload.
     *
     * @param UpdateEnterpriseAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return EnterpriseResource
     */
    public function update(UpdateEnterpriseAPIRequest $request, int $id): EnterpriseResource
    {
        $input = $request->all();
        $enterprise = $this->enterpriseRepository->update($input, $id);

        return new EnterpriseResource($enterprise);
    }

    /**
     * Delete given Enterprise.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->enterpriseRepository->delete($id);

        return $this->successResponse('Enterprise deleted successfully.');
    }

    /**
     * Bulk create Enterprise's.
     *
     * @param BulkCreateEnterpriseAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EnterpriseCollection
     */
    public function bulkStore(BulkCreateEnterpriseAPIRequest $request): EnterpriseCollection
    {
        $enterprises = collect();

        $input = $request->get('data');
        foreach ($input as $key => $enterpriseInput) {
            $enterprises[$key] = $this->enterpriseRepository->create($enterpriseInput);
        }

        return new EnterpriseCollection($enterprises);
    }

    /**
     * Bulk update Enterprise's data.
     *
     * @param BulkUpdateEnterpriseAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return EnterpriseCollection
     */
    public function bulkUpdate(BulkUpdateEnterpriseAPIRequest $request): EnterpriseCollection
    {
        $enterprises = collect();

        $input = $request->get('data');
        foreach ($input as $key => $enterpriseInput) {
            $enterprises[$key] = $this->enterpriseRepository->update($enterpriseInput, $enterpriseInput['id']);
        }

        return new EnterpriseCollection($enterprises);
    }
}

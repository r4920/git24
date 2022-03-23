<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateMasterAPIRequest;
use App\Http\Requests\Admin\BulkUpdateMasterAPIRequest;
use App\Http\Requests\Admin\CreateMasterAPIRequest;
use App\Http\Requests\Admin\UpdateMasterAPIRequest;
use App\Http\Resources\Admin\MasterCollection;
use App\Http\Resources\Admin\MasterResource;
use App\Repositories\MasterRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MasterController extends AppBaseController
{
    /**
     * @var MasterRepository
     */
    private MasterRepository $masterRepository;

    /**
     * @param MasterRepository $masterRepository
     */
    public function __construct(MasterRepository $masterRepository)
    {
        $this->masterRepository = $masterRepository;
    }

    /**
     * Master's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MasterCollection
     */
    public function index(Request $request): MasterCollection
    {
        $masters = $this->masterRepository->fetch($request);

        return new MasterCollection($masters);
    }

    /**
     * Create Master with given payload.
     *
     * @param CreateMasterAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MasterResource
     */
    public function store(CreateMasterAPIRequest $request): MasterResource
    {
        $input = $request->all();
        $master = $this->masterRepository->create($input);

        return new MasterResource($master);
    }

    /**
     * Get single Master record.
     *
     * @param int $id
     *
     * @return MasterResource
     */
    public function show(int $id): MasterResource
    {
        $master = $this->masterRepository->findOrFail($id);

        return new MasterResource($master);
    }

    /**
     * Update Master with given payload.
     *
     * @param UpdateMasterAPIRequest $request
     * @param int                    $id
     *
     * @throws ValidatorException
     *
     * @return MasterResource
     */
    public function update(UpdateMasterAPIRequest $request, int $id): MasterResource
    {
        $input = $request->all();
        $master = $this->masterRepository->update($input, $id);

        return new MasterResource($master);
    }

    /**
     * Delete given Master.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->masterRepository->delete($id);

        return $this->successResponse('Master deleted successfully.');
    }

    /**
     * Bulk create Master's.
     *
     * @param BulkCreateMasterAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MasterCollection
     */
    public function bulkStore(BulkCreateMasterAPIRequest $request): MasterCollection
    {
        $masters = collect();

        $input = $request->get('data');
        foreach ($input as $key => $masterInput) {
            $masters[$key] = $this->masterRepository->create($masterInput);
        }

        return new MasterCollection($masters);
    }

    /**
     * Bulk update Master's data.
     *
     * @param BulkUpdateMasterAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MasterCollection
     */
    public function bulkUpdate(BulkUpdateMasterAPIRequest $request): MasterCollection
    {
        $masters = collect();

        $input = $request->get('data');
        foreach ($input as $key => $masterInput) {
            $masters[$key] = $this->masterRepository->update($masterInput, $masterInput['id']);
        }

        return new MasterCollection($masters);
    }
}

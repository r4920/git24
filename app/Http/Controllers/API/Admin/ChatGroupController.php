<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateChatGroupAPIRequest;
use App\Http\Requests\Admin\BulkUpdateChatGroupAPIRequest;
use App\Http\Requests\Admin\CreateChatGroupAPIRequest;
use App\Http\Requests\Admin\UpdateChatGroupAPIRequest;
use App\Http\Resources\Admin\ChatGroupCollection;
use App\Http\Resources\Admin\ChatGroupResource;
use App\Repositories\ChatGroupRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ChatGroupController extends AppBaseController
{
    /**
     * @var ChatGroupRepository
     */
    private ChatGroupRepository $chatGroupRepository;

    /**
     * @param ChatGroupRepository $chatGroupRepository
     */
    public function __construct(ChatGroupRepository $chatGroupRepository)
    {
        $this->chatGroupRepository = $chatGroupRepository;
    }

    /**
     * ChatGroup's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ChatGroupCollection
     */
    public function index(Request $request): ChatGroupCollection
    {
        $chatGroups = $this->chatGroupRepository->fetch($request);

        return new ChatGroupCollection($chatGroups);
    }

    /**
     * Create ChatGroup with given payload.
     *
     * @param CreateChatGroupAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ChatGroupResource
     */
    public function store(CreateChatGroupAPIRequest $request): ChatGroupResource
    {
        $input = $request->all();
        $chatGroup = $this->chatGroupRepository->create($input);

        return new ChatGroupResource($chatGroup);
    }

    /**
     * Get single ChatGroup record.
     *
     * @param int $id
     *
     * @return ChatGroupResource
     */
    public function show(int $id): ChatGroupResource
    {
        $chatGroup = $this->chatGroupRepository->findOrFail($id);

        return new ChatGroupResource($chatGroup);
    }

    /**
     * Update ChatGroup with given payload.
     *
     * @param UpdateChatGroupAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return ChatGroupResource
     */
    public function update(UpdateChatGroupAPIRequest $request, int $id): ChatGroupResource
    {
        $input = $request->all();
        $chatGroup = $this->chatGroupRepository->update($input, $id);

        return new ChatGroupResource($chatGroup);
    }

    /**
     * Delete given ChatGroup.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->chatGroupRepository->delete($id);

        return $this->successResponse('ChatGroup deleted successfully.');
    }

    /**
     * Bulk create ChatGroup's.
     *
     * @param BulkCreateChatGroupAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ChatGroupCollection
     */
    public function bulkStore(BulkCreateChatGroupAPIRequest $request): ChatGroupCollection
    {
        $chatGroups = collect();

        $input = $request->get('data');
        foreach ($input as $key => $chatGroupInput) {
            $chatGroups[$key] = $this->chatGroupRepository->create($chatGroupInput);
        }

        return new ChatGroupCollection($chatGroups);
    }

    /**
     * Bulk update ChatGroup's data.
     *
     * @param BulkUpdateChatGroupAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ChatGroupCollection
     */
    public function bulkUpdate(BulkUpdateChatGroupAPIRequest $request): ChatGroupCollection
    {
        $chatGroups = collect();

        $input = $request->get('data');
        foreach ($input as $key => $chatGroupInput) {
            $chatGroups[$key] = $this->chatGroupRepository->update($chatGroupInput, $chatGroupInput['id']);
        }

        return new ChatGroupCollection($chatGroups);
    }
}

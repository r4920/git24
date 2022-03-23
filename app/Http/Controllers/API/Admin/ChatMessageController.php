<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateChatMessageAPIRequest;
use App\Http\Requests\Admin\BulkUpdateChatMessageAPIRequest;
use App\Http\Requests\Admin\CreateChatMessageAPIRequest;
use App\Http\Requests\Admin\UpdateChatMessageAPIRequest;
use App\Http\Resources\Admin\ChatMessageCollection;
use App\Http\Resources\Admin\ChatMessageResource;
use App\Repositories\ChatMessageRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ChatMessageController extends AppBaseController
{
    /**
     * @var ChatMessageRepository
     */
    private ChatMessageRepository $chatMessageRepository;

    /**
     * @param ChatMessageRepository $chatMessageRepository
     */
    public function __construct(ChatMessageRepository $chatMessageRepository)
    {
        $this->chatMessageRepository = $chatMessageRepository;
    }

    /**
     * ChatMessage's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ChatMessageCollection
     */
    public function index(Request $request): ChatMessageCollection
    {
        $chatMessages = $this->chatMessageRepository->fetch($request);

        return new ChatMessageCollection($chatMessages);
    }

    /**
     * Create ChatMessage with given payload.
     *
     * @param CreateChatMessageAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ChatMessageResource
     */
    public function store(CreateChatMessageAPIRequest $request): ChatMessageResource
    {
        $input = $request->all();
        $chatMessage = $this->chatMessageRepository->create($input);

        return new ChatMessageResource($chatMessage);
    }

    /**
     * Get single ChatMessage record.
     *
     * @param int $id
     *
     * @return ChatMessageResource
     */
    public function show(int $id): ChatMessageResource
    {
        $chatMessage = $this->chatMessageRepository->findOrFail($id);

        return new ChatMessageResource($chatMessage);
    }

    /**
     * Update ChatMessage with given payload.
     *
     * @param UpdateChatMessageAPIRequest $request
     * @param int                         $id
     *
     * @throws ValidatorException
     *
     * @return ChatMessageResource
     */
    public function update(UpdateChatMessageAPIRequest $request, int $id): ChatMessageResource
    {
        $input = $request->all();
        $chatMessage = $this->chatMessageRepository->update($input, $id);

        return new ChatMessageResource($chatMessage);
    }

    /**
     * Delete given ChatMessage.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->chatMessageRepository->delete($id);

        return $this->successResponse('ChatMessage deleted successfully.');
    }

    /**
     * Bulk create ChatMessage's.
     *
     * @param BulkCreateChatMessageAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ChatMessageCollection
     */
    public function bulkStore(BulkCreateChatMessageAPIRequest $request): ChatMessageCollection
    {
        $chatMessages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $chatMessageInput) {
            $chatMessages[$key] = $this->chatMessageRepository->create($chatMessageInput);
        }

        return new ChatMessageCollection($chatMessages);
    }

    /**
     * Bulk update ChatMessage's data.
     *
     * @param BulkUpdateChatMessageAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ChatMessageCollection
     */
    public function bulkUpdate(BulkUpdateChatMessageAPIRequest $request): ChatMessageCollection
    {
        $chatMessages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $chatMessageInput) {
            $chatMessages[$key] = $this->chatMessageRepository->update($chatMessageInput, $chatMessageInput['id']);
        }

        return new ChatMessageCollection($chatMessages);
    }
}

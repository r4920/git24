<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateCommentAPIRequest;
use App\Http\Requests\Admin\BulkUpdateCommentAPIRequest;
use App\Http\Requests\Admin\CreateCommentAPIRequest;
use App\Http\Requests\Admin\UpdateCommentAPIRequest;
use App\Http\Resources\Admin\CommentCollection;
use App\Http\Resources\Admin\CommentResource;
use App\Repositories\CommentRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CommentController extends AppBaseController
{
    /**
     * @var CommentRepository
     */
    private CommentRepository $commentRepository;

    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Comment's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CommentCollection
     */
    public function index(Request $request): CommentCollection
    {
        $comments = $this->commentRepository->fetch($request);

        return new CommentCollection($comments);
    }

    /**
     * Create Comment with given payload.
     *
     * @param CreateCommentAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CommentResource
     */
    public function store(CreateCommentAPIRequest $request): CommentResource
    {
        $input = $request->all();
        $comment = $this->commentRepository->create($input);

        return new CommentResource($comment);
    }

    /**
     * Get single Comment record.
     *
     * @param int $id
     *
     * @return CommentResource
     */
    public function show(int $id): CommentResource
    {
        $comment = $this->commentRepository->findOrFail($id);

        return new CommentResource($comment);
    }

    /**
     * Update Comment with given payload.
     *
     * @param UpdateCommentAPIRequest $request
     * @param int                     $id
     *
     * @throws ValidatorException
     *
     * @return CommentResource
     */
    public function update(UpdateCommentAPIRequest $request, int $id): CommentResource
    {
        $input = $request->all();
        $comment = $this->commentRepository->update($input, $id);

        return new CommentResource($comment);
    }

    /**
     * Delete given Comment.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->commentRepository->delete($id);

        return $this->successResponse('Comment deleted successfully.');
    }

    /**
     * Bulk create Comment's.
     *
     * @param BulkCreateCommentAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CommentCollection
     */
    public function bulkStore(BulkCreateCommentAPIRequest $request): CommentCollection
    {
        $comments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $commentInput) {
            $comments[$key] = $this->commentRepository->create($commentInput);
        }

        return new CommentCollection($comments);
    }

    /**
     * Bulk update Comment's data.
     *
     * @param BulkUpdateCommentAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CommentCollection
     */
    public function bulkUpdate(BulkUpdateCommentAPIRequest $request): CommentCollection
    {
        $comments = collect();

        $input = $request->get('data');
        foreach ($input as $key => $commentInput) {
            $comments[$key] = $this->commentRepository->update($commentInput, $commentInput['id']);
        }

        return new CommentCollection($comments);
    }
}

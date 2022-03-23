<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateNoteAPIRequest;
use App\Http\Requests\Device\BulkUpdateNoteAPIRequest;
use App\Http\Requests\Device\CreateNoteAPIRequest;
use App\Http\Requests\Device\UpdateNoteAPIRequest;
use App\Http\Resources\Device\NoteCollection;
use App\Http\Resources\Device\NoteResource;
use App\Repositories\NoteRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class NoteController extends AppBaseController
{
    /**
     * @var NoteRepository
     */
    private NoteRepository $noteRepository;

    /**
     * @param NoteRepository $noteRepository
     */
    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * Note's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return NoteCollection
     */
    public function index(Request $request): NoteCollection
    {
        $notes = $this->noteRepository->fetch($request);

        return new NoteCollection($notes);
    }

    /**
     * Create Note with given payload.
     *
     * @param CreateNoteAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return NoteResource
     */
    public function store(CreateNoteAPIRequest $request): NoteResource
    {
        $input = $request->all();
        $note = $this->noteRepository->create($input);

        return new NoteResource($note);
    }

    /**
     * Get single Note record.
     *
     * @param int $id
     *
     * @return NoteResource
     */
    public function show(int $id): NoteResource
    {
        $note = $this->noteRepository->findOrFail($id);

        return new NoteResource($note);
    }

    /**
     * Update Note with given payload.
     *
     * @param UpdateNoteAPIRequest $request
     * @param int                  $id
     *
     * @throws ValidatorException
     *
     * @return NoteResource
     */
    public function update(UpdateNoteAPIRequest $request, int $id): NoteResource
    {
        $input = $request->all();
        $note = $this->noteRepository->update($input, $id);

        return new NoteResource($note);
    }

    /**
     * Delete given Note.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->noteRepository->delete($id);

        return $this->successResponse('Note deleted successfully.');
    }

    /**
     * Bulk create Note's.
     *
     * @param BulkCreateNoteAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return NoteCollection
     */
    public function bulkStore(BulkCreateNoteAPIRequest $request): NoteCollection
    {
        $notes = collect();

        $input = $request->get('data');
        foreach ($input as $key => $noteInput) {
            $notes[$key] = $this->noteRepository->create($noteInput);
        }

        return new NoteCollection($notes);
    }

    /**
     * Bulk update Note's data.
     *
     * @param BulkUpdateNoteAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return NoteCollection
     */
    public function bulkUpdate(BulkUpdateNoteAPIRequest $request): NoteCollection
    {
        $notes = collect();

        $input = $request->get('data');
        foreach ($input as $key => $noteInput) {
            $notes[$key] = $this->noteRepository->update($noteInput, $noteInput['id']);
        }

        return new NoteCollection($notes);
    }
}

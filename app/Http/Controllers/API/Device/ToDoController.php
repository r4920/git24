<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateToDoAPIRequest;
use App\Http\Requests\Device\BulkUpdateToDoAPIRequest;
use App\Http\Requests\Device\CreateToDoAPIRequest;
use App\Http\Requests\Device\UpdateToDoAPIRequest;
use App\Http\Resources\Device\ToDoCollection;
use App\Http\Resources\Device\ToDoResource;
use App\Repositories\ToDoRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ToDoController extends AppBaseController
{
    /**
     * @var ToDoRepository
     */
    private ToDoRepository $toDoRepository;

    /**
     * @param ToDoRepository $toDoRepository
     */
    public function __construct(ToDoRepository $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    /**
     * ToDo's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ToDoCollection
     */
    public function index(Request $request): ToDoCollection
    {
        $toDos = $this->toDoRepository->fetch($request);

        return new ToDoCollection($toDos);
    }

    /**
     * Create ToDo with given payload.
     *
     * @param CreateToDoAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ToDoResource
     */
    public function store(CreateToDoAPIRequest $request): ToDoResource
    {
        $input = $request->all();
        $toDo = $this->toDoRepository->create($input);

        return new ToDoResource($toDo);
    }

    /**
     * Get single ToDo record.
     *
     * @param int $id
     *
     * @return ToDoResource
     */
    public function show(int $id): ToDoResource
    {
        $toDo = $this->toDoRepository->findOrFail($id);

        return new ToDoResource($toDo);
    }

    /**
     * Update ToDo with given payload.
     *
     * @param UpdateToDoAPIRequest $request
     * @param int                  $id
     *
     * @throws ValidatorException
     *
     * @return ToDoResource
     */
    public function update(UpdateToDoAPIRequest $request, int $id): ToDoResource
    {
        $input = $request->all();
        $toDo = $this->toDoRepository->update($input, $id);

        return new ToDoResource($toDo);
    }

    /**
     * Delete given ToDo.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->toDoRepository->delete($id);

        return $this->successResponse('ToDo deleted successfully.');
    }

    /**
     * Bulk create ToDo's.
     *
     * @param BulkCreateToDoAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ToDoCollection
     */
    public function bulkStore(BulkCreateToDoAPIRequest $request): ToDoCollection
    {
        $toDos = collect();

        $input = $request->get('data');
        foreach ($input as $key => $toDoInput) {
            $toDos[$key] = $this->toDoRepository->create($toDoInput);
        }

        return new ToDoCollection($toDos);
    }

    /**
     * Bulk update ToDo's data.
     *
     * @param BulkUpdateToDoAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ToDoCollection
     */
    public function bulkUpdate(BulkUpdateToDoAPIRequest $request): ToDoCollection
    {
        $toDos = collect();

        $input = $request->get('data');
        foreach ($input as $key => $toDoInput) {
            $toDos[$key] = $this->toDoRepository->update($toDoInput, $toDoInput['id']);
        }

        return new ToDoCollection($toDos);
    }
}

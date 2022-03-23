<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateTaskAPIRequest;
use App\Http\Requests\Device\BulkUpdateTaskAPIRequest;
use App\Http\Requests\Device\CreateTaskAPIRequest;
use App\Http\Requests\Device\UpdateTaskAPIRequest;
use App\Http\Resources\Device\TaskCollection;
use App\Http\Resources\Device\TaskResource;
use App\Repositories\TaskRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class TaskController extends AppBaseController
{
    /**
     * @var TaskRepository
     */
    private TaskRepository $taskRepository;

    /**
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Task's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return TaskCollection
     */
    public function index(Request $request): TaskCollection
    {
        $tasks = $this->taskRepository->fetch($request);

        return new TaskCollection($tasks);
    }

    /**
     * Create Task with given payload.
     *
     * @param CreateTaskAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TaskResource
     */
    public function store(CreateTaskAPIRequest $request): TaskResource
    {
        $input = $request->all();
        $task = $this->taskRepository->create($input);

        return new TaskResource($task);
    }

    /**
     * Get single Task record.
     *
     * @param int $id
     *
     * @return TaskResource
     */
    public function show(int $id): TaskResource
    {
        $task = $this->taskRepository->findOrFail($id);

        return new TaskResource($task);
    }

    /**
     * Update Task with given payload.
     *
     * @param UpdateTaskAPIRequest $request
     * @param int                  $id
     *
     * @throws ValidatorException
     *
     * @return TaskResource
     */
    public function update(UpdateTaskAPIRequest $request, int $id): TaskResource
    {
        $input = $request->all();
        $task = $this->taskRepository->update($input, $id);

        return new TaskResource($task);
    }

    /**
     * Delete given Task.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->taskRepository->delete($id);

        return $this->successResponse('Task deleted successfully.');
    }

    /**
     * Bulk create Task's.
     *
     * @param BulkCreateTaskAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TaskCollection
     */
    public function bulkStore(BulkCreateTaskAPIRequest $request): TaskCollection
    {
        $tasks = collect();

        $input = $request->get('data');
        foreach ($input as $key => $taskInput) {
            $tasks[$key] = $this->taskRepository->create($taskInput);
        }

        return new TaskCollection($tasks);
    }

    /**
     * Bulk update Task's data.
     *
     * @param BulkUpdateTaskAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TaskCollection
     */
    public function bulkUpdate(BulkUpdateTaskAPIRequest $request): TaskCollection
    {
        $tasks = collect();

        $input = $request->get('data');
        foreach ($input as $key => $taskInput) {
            $tasks[$key] = $this->taskRepository->update($taskInput, $taskInput['id']);
        }

        return new TaskCollection($tasks);
    }
}

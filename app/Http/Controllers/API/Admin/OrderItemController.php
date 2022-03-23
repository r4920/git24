<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateOrderItemAPIRequest;
use App\Http\Requests\Admin\BulkUpdateOrderItemAPIRequest;
use App\Http\Requests\Admin\CreateOrderItemAPIRequest;
use App\Http\Requests\Admin\UpdateOrderItemAPIRequest;
use App\Http\Resources\Admin\OrderItemCollection;
use App\Http\Resources\Admin\OrderItemResource;
use App\Repositories\OrderItemRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class OrderItemController extends AppBaseController
{
    /**
     * @var OrderItemRepository
     */
    private OrderItemRepository $orderItemRepository;

    /**
     * @param OrderItemRepository $orderItemRepository
     */
    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    /**
     * OrderItem's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return OrderItemCollection
     */
    public function index(Request $request): OrderItemCollection
    {
        $orderItems = $this->orderItemRepository->fetch($request);

        return new OrderItemCollection($orderItems);
    }

    /**
     * Create OrderItem with given payload.
     *
     * @param CreateOrderItemAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderItemResource
     */
    public function store(CreateOrderItemAPIRequest $request): OrderItemResource
    {
        $input = $request->all();
        $orderItem = $this->orderItemRepository->create($input);

        return new OrderItemResource($orderItem);
    }

    /**
     * Get single OrderItem record.
     *
     * @param int $id
     *
     * @return OrderItemResource
     */
    public function show(int $id): OrderItemResource
    {
        $orderItem = $this->orderItemRepository->findOrFail($id);

        return new OrderItemResource($orderItem);
    }

    /**
     * Update OrderItem with given payload.
     *
     * @param UpdateOrderItemAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return OrderItemResource
     */
    public function update(UpdateOrderItemAPIRequest $request, int $id): OrderItemResource
    {
        $input = $request->all();
        $orderItem = $this->orderItemRepository->update($input, $id);

        return new OrderItemResource($orderItem);
    }

    /**
     * Delete given OrderItem.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->orderItemRepository->delete($id);

        return $this->successResponse('OrderItem deleted successfully.');
    }

    /**
     * Bulk create OrderItem's.
     *
     * @param BulkCreateOrderItemAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderItemCollection
     */
    public function bulkStore(BulkCreateOrderItemAPIRequest $request): OrderItemCollection
    {
        $orderItems = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderItemInput) {
            $orderItems[$key] = $this->orderItemRepository->create($orderItemInput);
        }

        return new OrderItemCollection($orderItems);
    }

    /**
     * Bulk update OrderItem's data.
     *
     * @param BulkUpdateOrderItemAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderItemCollection
     */
    public function bulkUpdate(BulkUpdateOrderItemAPIRequest $request): OrderItemCollection
    {
        $orderItems = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderItemInput) {
            $orderItems[$key] = $this->orderItemRepository->update($orderItemInput, $orderItemInput['id']);
        }

        return new OrderItemCollection($orderItems);
    }
}

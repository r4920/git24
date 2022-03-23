<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateOrderAPIRequest;
use App\Http\Requests\Device\BulkUpdateOrderAPIRequest;
use App\Http\Requests\Device\CreateOrderAPIRequest;
use App\Http\Requests\Device\UpdateOrderAPIRequest;
use App\Http\Resources\Device\OrderCollection;
use App\Http\Resources\Device\OrderResource;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class OrderController extends AppBaseController
{
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Order's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return OrderCollection
     */
    public function index(Request $request): OrderCollection
    {
        $orders = $this->orderRepository->fetch($request);

        return new OrderCollection($orders);
    }

    /**
     * Create Order with given payload.
     *
     * @param CreateOrderAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderResource
     */
    public function store(CreateOrderAPIRequest $request): OrderResource
    {
        $input = $request->all();
        $order = $this->orderRepository->create($input);

        return new OrderResource($order);
    }

    /**
     * Get single Order record.
     *
     * @param int $id
     *
     * @return OrderResource
     */
    public function show(int $id): OrderResource
    {
        $order = $this->orderRepository->findOrFail($id);

        return new OrderResource($order);
    }

    /**
     * Update Order with given payload.
     *
     * @param UpdateOrderAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return OrderResource
     */
    public function update(UpdateOrderAPIRequest $request, int $id): OrderResource
    {
        $input = $request->all();
        $order = $this->orderRepository->update($input, $id);

        return new OrderResource($order);
    }

    /**
     * Delete given Order.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->orderRepository->delete($id);

        return $this->successResponse('Order deleted successfully.');
    }

    /**
     * Bulk create Order's.
     *
     * @param BulkCreateOrderAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderCollection
     */
    public function bulkStore(BulkCreateOrderAPIRequest $request): OrderCollection
    {
        $orders = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderInput) {
            $orders[$key] = $this->orderRepository->create($orderInput);
        }

        return new OrderCollection($orders);
    }

    /**
     * Bulk update Order's data.
     *
     * @param BulkUpdateOrderAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OrderCollection
     */
    public function bulkUpdate(BulkUpdateOrderAPIRequest $request): OrderCollection
    {
        $orders = collect();

        $input = $request->get('data');
        foreach ($input as $key => $orderInput) {
            $orders[$key] = $this->orderRepository->update($orderInput, $orderInput['id']);
        }

        return new OrderCollection($orders);
    }
}

<?php

namespace App\Http\Controllers\Admin\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Order\OrderStoreRequest;
use App\Http\Requests\Admin\Order\OrderUpdateRequest;
use App\Http\Resources\Admin\Order\OrderResource;

class OrderController extends BaseController
{
    public function __construct(OrderRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Order'
        );

        $this->storeRequestClass = OrderStoreRequest::class;
        $this->updateRequestClass = OrderUpdateRequest::class;
        $this->resourceClass = OrderResource::class;
    }
}

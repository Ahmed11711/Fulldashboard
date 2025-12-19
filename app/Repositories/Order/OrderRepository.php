<?php

namespace App\Repositories\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
}

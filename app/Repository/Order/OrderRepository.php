<?php

namespace App\Repository\Order;

use App\Models\Order;
use App\Repository\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
       return Order::class;
    }

    public function getOrder()
    {
       return $this->model->search()->orderByDesc('created_at')->paginate(5);
    }

}

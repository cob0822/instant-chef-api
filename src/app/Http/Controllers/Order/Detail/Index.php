<?php

namespace App\Http\Controllers\Order\Detail;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailResource;
use App\Models\Order;
use Throwable;

class Index extends Controller
{
    /**
     * @return OrderResource
     * @throws Throwable
     */
    public function __invoke(Order $order)
    {
        return new OrderDetailResource($order);
    }
}

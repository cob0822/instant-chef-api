<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Database\Queries\Order\FindBySelectedConditions;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Throwable;

class Index extends Controller
{
    /** @var FindBySelectedConditions */
    private $findBySelectedConditions;

    /**
     * Index constructor
     * @param FindBySelectedConditions $findBySelectedConditions
     */
    public function __construct(FindBySelectedConditions $findBySelectedConditions)
    {
        $this->findBySelectedConditions = $findBySelectedConditions;
    }

    /**
     * @return OrderResource
     * @throws Throwable
     */
    public function __invoke()
    {
        $orders = $this->findBySelectedConditions->execute();

        return OrderResource::collection($orders);
    }
}

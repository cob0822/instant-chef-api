<?php

namespace App\Database\Queries\Order;

use App\Models\Order;
use Illminate\Database\Eloquent\Collection;

/**
 * Class FindBySelectedConditions
 */
class FindBySelectedConditions extends Query
{
    /**
     * @return Order[]
     */
    public function execute()
    {
        return $this
            ->getOrder()
            ->get()
            ;
    }
}

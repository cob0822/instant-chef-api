<?php

namespace App\Database\Queries\Order;

use App\Models\Order;

/**
 * Class Query
 * @package App\Database\Queries\Order
 */
abstract class Query
{
    /** @var array */
    private const DEFAULT_WITH = [];

    /**
     * @param array $with
     * @return Order
     */
    protected function getOrder(array $with = self::DEFAULT_WITH)
    {
        return (new Order)->with($with);
    }
}

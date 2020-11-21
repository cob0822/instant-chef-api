<?php

namespace App\Http\Resources;

use App\Model\Order;
use Illuminate\Http\Request;

/**
 * Class OrderResource
 * @package App\Http\Resources
 *
 * @property Order $resoure
 */
class OrderResource extends Resource
{
    /** @var string|null */
    public static $wrap = null;

    /**
     * @param Request $request
     * @return array
     */
    public function invoke($request)
    {
        return [
            'id' => $this->resource->id,
            'user_id' => $this->resource->user_id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'desired_date' => $this->resource->desired_date,
            'cooking_frequency' => $this->resource->cooking_frequency,
            'desired_cooking_time' => $this->resource->desired_cooking_time,
        ];
    }
}

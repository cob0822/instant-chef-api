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
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'desired_date' => $this->resource->desired_date,
            'user' => $this->resource->user,
            'categories' => $this->resource->categories,
        ];
    }
}

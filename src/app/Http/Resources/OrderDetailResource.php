<?php

namespace App\Http\Resources;

use App\Model\Order;
use Illuminate\Http\Request;

/**
 * Class OrderDetailResource
 * @package App\Http\Resources
 *
 * @property Order $resoure
 */
class OrderDetailResource extends Resource
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
            'cooking_frequency' => $this->resource->cooking_frequency,
            'desired_cooking_time' => $this->resource->desired_cooking_time,
            'user' => $this->resource->user,
            'categories' => $this->resource->categories,
            'tools' => $this->resource->tools,
            'ingredients' => $this->resource->ingredients,
        ];
    }
}

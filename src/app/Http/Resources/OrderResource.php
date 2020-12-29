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
            'creation_time' => $this->resource->desired_cooking_time,
            // 以下のデータが取れない
            'categories' => $this->resource->categories()->get(),
            'tool' => $this->resource->tools()->get(),
            'ingredients' => $this->resource->ingredients()->get(),
        ];
    }
}

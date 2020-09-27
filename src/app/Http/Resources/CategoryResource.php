<?php

namespace App\Http\Resources;

use App\Model\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryResource
 * @package App\Http\Resources
 *
 * @property Category $resoure
 */
class CategoryResource extends Resource
{
    /** @var string|null */
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
        ];
    }
}

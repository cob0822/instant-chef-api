<?php

namespace App\Http\Resources;

use Illuminate\Http\Resourses\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource as BaseResource;

/**
 * Class Resource
 * @package App\Http\Resources
 */
abstract class Resource extends BaseResource
{
    /**
     * @param mixed $resource
     * @return AnonymousResourceCollection
     */
    public static function collection($resource)
    {
        parent::$wrap = static::$wrap;
        return parent::collection($resource);
    }
}

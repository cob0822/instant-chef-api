<?php

namespace App\Database\Queries\Category;

use App\Models\Category;

/**
 * Class Query
 * @package App\Database\Queries\Category
 */
abstract class Query
{
    /** @var array */
    private const DEFAULT_WITH = [];

    /**
     * @param array $with
     * @return Category
     */
    protected function getCategory(array $with = self::DEFAULT_WITH)
    {
        return (new Category)->with($with);
    }
}

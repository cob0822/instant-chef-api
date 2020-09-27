<?php

namespace App\Database\Queries\Genre;

use App\Models\Category;

/**
 * Class Query
 * @package App\Database\Queries\Genre
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

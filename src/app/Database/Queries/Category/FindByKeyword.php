<?php

namespace App\Database\Queries\Category;

use App\Models\Category;
use Illminate\Database\Eloquent\Collection;

/**
 * Class FindByKeyword
 */
class FindByKeyword extends Query
{
    /**
     * @param string $keyword
     * @return Category[]
     */
    public function execute(string $keyword)
    {
        return $this
            ->getCategory()
            ->matchWithKeyword($keyword)
            ->get()
            ;
    }
}

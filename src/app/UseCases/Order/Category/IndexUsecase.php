<?php

namespace App\UseCases\Order\Category;

use Illuminate\Http\Request;
use App\Database\Queries\Category\FindByKeyword;
use App\Http\Resources\CategoryResource;
use App\Models\Order;
use Throwable;

class IndexUsecase
{
    /** @var FindByKeyword */
    private $findByKeyword;

    /**
     * IndexUsecase constructor
     * @param FindByKeyword $findByKeyword
     */
    public function __construct(FindByKeyword $findByKeyword)
    {
        $this->findByKeyword = $findByKeyword;
    }

    /**
     * @param Request $request
     * @return CategoryResource
     * @throws Throwable
     */
    public function invoke(Request $request)
    {
        $keyword = $request->keyword;
        $categories = $this->findByKeyword->execute($keyword);

        return CategoryResource::collection($categories);
    }
}

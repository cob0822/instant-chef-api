<?php

namespace App\Http\Controllers\Order\Category;

use App\Http\Controllers\Controller;
use App\UseCases\Order\Category\IndexUsecase;
use Illuminate\Http\Request;

class Index extends Controller
{
    /** @var IndexUsecase */
    private $indexUsecase;

    /**
     * Index constructor
     * @param IndexUsecase $indexUsecase
     */
    public function __construct(IndexUsecase $indexUsecase)
    {
        $this->indexUsecase = $indexUsecase;
    }

    /**
     * @param Request $request
     * @return CategoryResource
     * @throws Throwable
     */
    public function __invoke(Request $request)
    {
        return $this->indexUsecase->invoke($request);
    }
}

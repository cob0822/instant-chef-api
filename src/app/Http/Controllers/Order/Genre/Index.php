<?php

namespace App\Http\Controllers\Order\Genre;

use App\Http\Controllers\Controller;
use App\UseCases\Order\Genre\IndexUsecase;
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
     * @return GenreResource
     * @throws Throwable
     */
    public function __invoke(Request $request)
    {
        return $this->indexUsecase->invoke($request);
    }
}

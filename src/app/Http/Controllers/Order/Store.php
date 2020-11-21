<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\UseCases\Order\StoreUsecase;
use Illuminate\Http\Request;

class Store extends Controller
{
    /** @var StoreUsecase */
    private $storeUsecase;

    /**
     * Store constructor
     * @param StoreUsecase $storeUsecase
     */
    public function __construct(StoreUsecase $storeUsecase)
    {
        $this->storeUsecase = $storeUsecase;
    }

    /**
     * @param StoreRequest $request
     * @return OrderResource
     * @throws Throwable
     */
    public function __invoke(Request $request)
    {
        return $this->storeUsecase->invoke($request);
    }
}

<?php

namespace App\Http\Controllers\Signup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Signup\StoreRequest;
use App\User;
use App\UseCases\Signup\CreateUsecase;
use Illuminate\Http\Request;

class Store extends Controller
{
    /** @var CreateUsecase */
    private $createUsecase;

    /**
     * Store constructor
     * @param CreateUsecase $createUsecase
     */
    public function __construct(CreateUsecase $createUsecase)
    {
        $this->createUsecase = $createUsecase;
    }

    /**
     * @param StoreRequest $request
     * @return UserResource
     * @throws Throwable
     */
    public function __invoke(StoreRequest $request)
    {
        return $this->createUsecase->create($request);
    }
}

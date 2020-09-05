<?php

namespace App\Http\Controllers\Signup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Signup\StoreRequest;
// use App\Http\Resources\UserResource;
use App\Models\User;
use App\UseCases\Signup\CreateUsecase;
use Illuminate\Http\Request;
use Illuminate\Hashing\hashManager;

class Store extends Controller
{
    /** @var CreateUsecase */
    private $createUsecase;

    /** @var HashManager */
    private $hashManager;

    /**
     * Store constructor
     * @param CreateUsecase $createUsecase
     * @param HashManager $hashManager
     */
    public function __construct(CreateUsecase $createUsecase, HashManager $hashManager)
    {
        $this->createUsecase = $createUsecase;
        $this->hashManager = $hashManager;
    }

    /**
     * @param StoreRequest $request
     * @return UserResource
     * @throws Throwable
     */
    public function __invoke(StoreRequest $request)
    {
        $request = $request->userInput;
        $name = $request['name'];
        $email = $request['email'];
        $phone_number = $request['phone_number'];
        $password = $request['password'];
        $user = new User([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'password' => $this->hashManager->make($password),
        ]);

        return $this->createUsecase->invoke($user);
    }
}

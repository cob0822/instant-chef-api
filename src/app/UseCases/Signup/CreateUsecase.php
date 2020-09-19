<?php

namespace App\UseCases\Signup;

use App\Database\Commands\Save;
use Illuminate\Http\Request;
use App\User;
use Throwable;

class CreateUsecase
{
    /** @var save */
    private $save;

    /**
     * CreateUsecase constructor
     * @param Save $save
     */
    public function __construct(Save $save)
    {
        $this->save = $save;
    }

    /**
     * @param Request $request
     * @return UserResource
     * @throws Throwable
     */
    public function create(Request $request)
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
            'password' => bcrypt($password),
        ]);

        $this->save->execute($user);
        return $this->publishToken($email, $password);
    }

    protected function publishToken($email, $password)
    {
        $token = auth('api')->attempt(['email' => $email, 'password' => $password]);
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ]);
    }
}

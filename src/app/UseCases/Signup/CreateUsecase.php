<?php

namespace App\UseCases\Signup;

use App\Database\Commands\Save;
// use App\Http\Resources\UserResource;
use App\Models\User;
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
     * @param User $user
     * @return UserResource
     * @throws Throwable
     */
    public function invoke(User $user)
    {
        $this->save->execute($user);
        // return new UserResources($user);
    }
}

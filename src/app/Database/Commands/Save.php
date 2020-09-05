<?php

namespace App\Database\Commands;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class save extends Command
{
    /**
     * @param Model $model
     * @return Model
     * @throws Trowable
     */
    public function execute(Model $model)
    {
        return $this->databaseManager->transaction(function () use ($model) {
            $model->save();
            return $model;
        });
    }
}

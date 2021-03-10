<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Throwable;

class Index extends Controller
{
    /**
     * @return CategoryResource
     * @throws Throwable
     */
    public function __invoke()
    {
        return (new Category)->get();
    }
}

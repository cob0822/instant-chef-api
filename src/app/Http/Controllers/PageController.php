<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return app('files')->get(public_path('dist/index.html'));
    }
}

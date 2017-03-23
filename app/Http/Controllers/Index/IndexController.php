<?php

namespace App\Http\Controllers\Index;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function run()
    {
        return view('index', ['menus' => $this->getMenu()]);
    }
}

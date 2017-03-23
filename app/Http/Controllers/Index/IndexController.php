<?php

namespace App\Http\Controllers\Index;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


class IndexController extends Controller
{
    public function run()
    {
        return view('index')->with('menus', $this->getMenu());
    }
}

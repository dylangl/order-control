<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2017/3/24
 * Time: 下午7:52
 */

namespace App\Http\Controllers\Manage;


use App\Http\Controllers\Controller;
use App\User;

class UserListController extends Controller
{
    public function run()
    {
        $model = new User();
        $list = $model->getList();
        return view('manage/user', ['users' => $list])->with('menus', $this->getMenu());
    }
}
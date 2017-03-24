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
use Illuminate\Support\Facades\DB;

class UserListController extends Controller
{
    public function run()
    {
//        $users = DB::table('users')->get();
//        dd($users);
        $model = new User();
        $list = $model->getList();
        return view('manage/user', ['users' => $list])->with('menus', $this->getMenu());
    }
}
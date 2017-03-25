<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2017/3/25
 * Time: 下午1:28
 */

namespace App\Http\Controllers\Manage;


use App\Common\Define\RetCode;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserVerifyController extends Controller
{
    public function run(Request $request)
    {
        $userIds = $request->uids;
        $status = $request->status;
        $userIds = explode(',', $userIds);
        $model = new User();
        $model->verify($userIds, $status);
        return $this->renderRetData(RetCode::SUCCESS, '审核成功');
    }
}
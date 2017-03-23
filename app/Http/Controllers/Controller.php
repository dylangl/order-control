<?php

namespace App\Http\Controllers;

use App\Common\Define\Common;
use App\Common\Define\RetCode;
use App\Exceptions\ParamException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function renderRetData($code, $msg, $url = '')
    {
        if (!is_null($url)) {
            $url = url($url);
        }
        $result = [
            'code' => $code,
            'msg' => $msg,
            'url' => $url,
        ];
        return response()->json($result);
    }

    //参数验证
    public function validate()
    {
        $calledClass = get_called_class();
        $paramRules = $calledClass::rules();
        foreach ($paramRules as $title => $value) {
            //构建验证规则数组
            $rule[$title] = $value[0];
            //别名数组
            $attributeName[$title] = $value[1];
        }

        $validation = \Validator::make(app()->request->all(), $rule)->setAttributeNames($attributeName);
        if ($validation->fails()) {
            throw new ParamException($validation->messages()->first(), RetCode::ERR_PARAM);
        }
    }

    //获取菜单
    public function getMenu()
    {
        $groupId = Auth::user()->group_id;
        $data = DB::table('group')
            ->where('id', $groupId)
            ->where('is_deleted', Common::FALSE)
            ->first();

        if (empty($data)) {
            return [];
        }

        $rules = $data->rules;
        $rules = json_decode($rules, true);

        $menus = DB::table('rule')
            ->select('title', 'url', 'icon')
            ->whereIn('id', $rules)
            ->where('is_deleted', Common::FALSE)
            ->where('status', Common::TRUE)
            ->orderBy('sort', 'asc')
            ->get()->toArray();

        return $menus;
//        dump($menus);
    }

}

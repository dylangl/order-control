<?php

namespace App\Http\Controllers;

use App\Common\Define\RetCode;
use App\Exceptions\ParamException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

}

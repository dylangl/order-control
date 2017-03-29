<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 2017/3/29
 * Time: 下午7:47
 */

namespace App\Http\Controllers\Manage;

use App\Common\Define\RetCode;
use App\Http\Controllers\Controller;
use App\Http\Model\ProductModel;
use Illuminate\Http\Request;

class ProductAddController extends Controller
{
    public function run(Request $request)
    {
        $file = $request->file('pic');

        if (!$file->isValid()) {
            //上传文件无效
            dump('上传文件无效');
        }

        //存储图片
        $url = $file->store('images');
        $inputData = [
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'brand' => $request->brand,
            'pic' => $url,
            'weight' => $request->weight,
            'size' => $request->size,
            'detail' => $request->detail,
            'classifyId' => $request->classifyId,
        ];

        $model = new ProductModel();
        $model->add($inputData);
        return $this->renderRetData(RetCode::SUCCESS, '添加成功');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2017/3/28
 * Time: 下午7:40
 */

namespace App\Http\Controllers\Manage;


use App\Http\Controllers\Controller;
use App\Http\Model\ProductModel;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function run()
    {
        $model = new ProductModel();
        $list = $model->getList();
        return view('manage/product', ['list' => $list])->with('menus', $this->getMenu());
    }
}
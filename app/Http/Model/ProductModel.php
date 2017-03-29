<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2017/3/28
 * Time: 下午7:45
 */

namespace App\Http\Model;


use App\Common\Define\Common;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{

    protected $table = 'products';

    public function getList($name = null, $page = 1)
    {
        $condition = self::where('is_deleted', Common::FALSE);
        if (!empty($name)) {
            $condition = $condition->whereLike('username', '%' . $name . '%');
        }
        $list = $condition->orderBy('created_at', 'desc')->paginate(10);

        return $list;
    }

    public function add($inputData)
    {
        $this->name = $inputData['name'];
        $this->price = $inputData['price'];
        $this->unit = $inputData['unit'];
        $this->brand = $inputData['brand'];
        $this->pic = $inputData['pic'];
        $this->detail = $inputData['detail'];
        $this->classify_id = $inputData['classifyId'];
        $this->weight = $inputData['weight'];
        $this->size = $inputData['size'];
        $this->is_show = Common::TRUE;
        $this->is_deleted = Common::FALSE;
        $this->pic = $inputData['pic'];
        $this->save();
    }
}
<?php

/**
 * 获取用户分组
 * @param $groupId
 * @return mixed
 */
function getGroupName($groupId)
{
    return \Illuminate\Support\Facades\DB::table('group')->where('id', $groupId)->value('title');
}

function getUserStatus($status){
    switch ($status){
        case '0':
            return '未审核';
            break;
        case '1':
            return '审核通过';
            break;
        case '2':
            return '审核不通过';
            break;
        default:
            return '未知';
            break;
    }
}

//获取订单状态
function GetProductState($state)
{
    switch ($state) {
        case '0':
            return '未处理';
            break;
        case '1':
            return '准备发货';
            break;
        case '2':
            return '已发货';
            break;
        case '3':
            return '缺货';
            break;
        case '4':
            return '已退款';
            break;
        default:
            return '未知';
            break;
    }
}

//获取支付状态
function GetPayState($state)
{
    switch ($state) {
        case '1':
            return '未支付';
            break;
        case '2':
            return '已支付';
            break;
        case '3':
            return '退款审核';
            break;
        case '4':
            return '已退款';
            break;
        case '5':
            return '暂缓支付';
            break;
        case '6':
            return '部分退款';
            break;
        default:
            return '未知';
            break;
    }
}

//获取用户权限分组
function GetGroupId($uid)
{
    //1 超级管理员
    $auth = new Auth();
    $auth = $auth->getGroups($uid);
    return $auth[0]['group_id'];
}

//判断是否为管理员
function IsAdmin()
{
    $uid = session('uid');
    $GroupId = GetGroupId($uid);
    $AdminGroups = array('2', '3', '4', '5', '6');
    if (in_array($GroupId, $AdminGroups)) {
        return true;
    } else {
        return false;
    }
}

//获取留言类型
function GetMessageType($state)
{
    switch ($state) {
        case '1':
            return '订单';
            break;
        case '2':
            return '询盘';
            break;
        default:
            return '未知';
            break;
    }
}

/**
 * 生成随机字符串
 * @param int $length 要生成的随机字符串长度
 * @param string $type 随机码类型：0，数字+大小写字母；1，数字；2，小写字母；3，大写字母；4，特殊字符；-1，数字+大小写字母+特殊字符
 * @return string
 * 格式 randCode(10,0)
 */
function randCode($length = 5, $type = 0)
{
    $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
    if ($type == 0) {
        array_pop($arr);
        $string = implode("", $arr);
    } elseif ($type == "-1") {
        $string = implode("", $arr);
    } else {
        $string = $arr[$type];
    }
    $count = strlen($string) - 1;
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $string[rand(0, $count)];
    }
    return $code;
}


//获取用户名字 如果是管理员 则返回‘管理员 姓名’ 如果是用户则返回‘我’
function GetMessageName($repuid)
{
    $auth = new Auth();
    $auth = $auth->getGroups($repuid);
    if ($repuid == session('uid')) {
        return '我';
    } else if ($auth[0]['group_id'] != '1') {
        $username = M('Member')->getFieldByUid($repuid, 'username');
        return '管理员' . $username;
    } else if ($auth[0]['group_id'] == '1') {
        $username = M('Member')->getFieldByUid($repuid, 'username');
        return $username;
    }
}

//在列表显示‘已读’按钮
function ShowReadButton($id)
{
    $IsRead = M('Message');
    $map['id'] = $id;
    $map['view'] = 0;

    if (IsAdmin()) {
        $IsRead = $IsRead->where($map)->where("repuid=uid")->count();
    }
    return $IsRead;
}

//获取未读消息数
function GetMessageCount($uid)
{
    $MessageCount = M("Message");
    if (IsAdmin()) {
        //回复用户和订单用户相同则表示是用户自己的回复
        $MessageCount = $MessageCount->where("repuid=uid and view='0'")->count();
    } else {
        $MessageCount = $MessageCount->where("uid=%d and repuid!=uid and view='0'", $uid)->count();
    }
    return $MessageCount;
}

//获取消息回复数量
function GetMessageRepCount($oid)
{
    $MessageCount = M("Message");
    $map['oid'] = $oid;
    if (IsAdmin()) {
        //回复用户和订单用户相同则表示是用户自己的回复
        $MessageCount = $MessageCount->where($map)->where("repuid=uid")->count();
    } else {
        $MessageCount = $MessageCount->where($map)->where("repuid!=uid")->count();
    }
    return $MessageCount;
}

//判断消息是否阅读 消息首页使用
function MessageIsView($view)
{
    if ($view == 1) {
        return '<span class="am-icon-envelope-o"> <small>已读</small></span>';
    } else {
        return '<span class="am-icon-envelope"> <small>有未读</small></span>';
    }
}

//返回订单未读消息数
function MessageHaveRead($orderid)
{
    $Read = M('Message');
    $map['oid'] = $oid;
    if (IsAdmin()) {
        $Read = $Read->where($map)->where("repuid=uid and view='0'")->count();
    } else {
        $Read = $Read->where($map)->where("repuid!=uid and view='0'")->count();
    }
    return $Read;
}

//检查用户是否有URL访问权限
function checkRule($rule)
{
    $uid = session('uid');
    $Auth = new Auth();
    if ($Auth->check($rule, $uid)) {
        return true;
    } else {
        return false;
    }
}

//解决导出EXCEL不能超过26列的问题
function stringFromColumnIndex($pColumnIndex = 0)
{
    static $_indexCache = array();
    if (!isset($_indexCache[$pColumnIndex])) {
        // Determine column string
        if ($pColumnIndex < 26) {
            $_indexCache[$pColumnIndex] = chr(65 + $pColumnIndex);
        } elseif ($pColumnIndex < 702) {
            $_indexCache[$pColumnIndex] = chr(64 + ($pColumnIndex / 26)) .
                chr(65 + $pColumnIndex % 26);
        } else {
            $_indexCache[$pColumnIndex] = chr(64 + (($pColumnIndex - 26) / 676)) .
                chr(65 + ((($pColumnIndex - 26) % 676) / 26)) .
                chr(65 + $pColumnIndex % 26);
        }
    }
    return $_indexCache[$pColumnIndex];
}

?>
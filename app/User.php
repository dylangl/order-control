<?php

namespace App;

use App\Common\Define\Common;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'full_name', 'phone', 'group_id', 'status', 'reg_ip', 'is_deleted', 'last_time', 'last_ip', 'is_deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getList($name = null, $page = 1)
    {
        $condition = self::where('is_deleted', Common::FALSE);
        if (!empty($name)) {
            $condition = $condition->whereLike('username', '%' . $name . '%');
        }
        $list = $condition->paginate(10);

        return $list;
    }

    //审核用户
    public function verify($userIds, $status)
    {
        self::whereIn('id', $userIds)
            ->update(['status' => $status]);
    }
}

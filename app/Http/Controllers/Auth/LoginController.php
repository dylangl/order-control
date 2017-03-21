<?php

namespace App\Http\Controllers\Auth;

use App\Common\Define\Common;
use App\Common\Define\RetCode;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

//    protected function validato1r(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6',
//            'fullName' => 'required',
//        ]);
//    }

    public static function rules()
    {
        return [
            'name' => ['required', '用户名'],
            'password' => ['required', '密码'],
        ];
    }

    public function login(Request $request)
    {
        $this->validate(self::rules(), $request->all());
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $status = Auth::user()->status;
            if ($status == Common::ACCOUNT_STATUS_AUDITING) {
                Auth::logout();
                return $this->renderRetData(RetCode::ERR_PARAM, '您的帐号正在审核中');
            } else if ($status == Common::ACCOUNT_STATUS_NO_PASS) {
                Auth::logout();
                return $this->renderRetData(RetCode::ERR_PARAM, '您的帐号审核未通过');
            }
            return $this->renderRetData(RetCode::SUCCESS, '登录成功');
        } else {
            return $this->renderRetData(RetCode::ERR_PARAM, '用户名或密码错误');
        }
    }



//
//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    protected $redirectTo = '/home';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest', ['except' => 'logout']);
//    }
//
//    public function username()
//    {
//        return 'name';
//    }
}

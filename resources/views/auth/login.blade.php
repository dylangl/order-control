<!DOCTYPE html>
<html>
<head lang="zh">
    <title>登录 - {{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="renderer" content="webkit">
    <script type="text/javascript" src="{{ asset('static/js/vue.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/axios.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/amazeui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/css/login.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/login.js') }}"></script>
    <link href="{{ asset('') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <h1>{{ config('app.name') }}
        <small> 登录</small>
    </h1>

    <div class="login" style="margin-top:50px;">
        <div class="header">
            <div class="switch" id="switch"><a class="switch_btn_focus"
                                               id="switch_qlogin"
                                               href="javascript:void(0);"
                                               tabindex="7">快速登录</a>
                <a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">快速注册</a>
                <div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
            </div>
        </div>

        <div class="web_qr_login" id="web_qr_login" style="display: block; height: 250px;">
            <!--登录-->
            <div class="web_login" id="web_login">
                <div class="login-box">
                    <div class="login_form">
                        <form v-on:submit.prevent="onLogin" class="am-form" id="login_form">
                            <div class="uinArea" id="uinArea">
                                <label class="input-tips" for="u">帐 号：</label>
                                <div class="inputOuter" id="uArea">
                                    <input type="text" id="u" v-model="login.name" class="inputstyle"/>
                                </div>
                            </div>
                            <div class="pwdArea" id="pwdArea">
                                <label class="input-tips" for="p">密 码：</label>
                                <div class="inputOuter" id="pArea">
                                    <input type="password" id="p" v-model="login.password"
                                           class="inputstyle"/>
                                </div>
                            </div>
                            <div style="padding-left:69px;margin-top:15px;">
                                <input type="submit" value="登 录" style="width:125px;" class="button_blue"/>
                                <a href="" class="zcxy">忘记密码？</a>
                            </div>
                            <div class="tip" v-text="loginMsg"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!--登录end-->
        </div>

        <!--注册-->
        <div class="qlogin" id="qlogin" style="display: none; ">
            <div class="web_login">
                <form v-on:submit.prevent="onReg">
                    <ul class="reg_form" id="reg-ul">
                        <div id="userCue" class="cue" v-html="regMsg"></div>
                        <li>
                            <label for="user" class="input-tips2">账号：</label>
                            <div class="inputOuter2">
                                <input type="text" v-model="reg.name" class="inputstyle2"/>
                            </div>
                        </li>

                        <li>
                            <label for="passwd" class="input-tips2">密码：</label>
                            <div class="inputOuter2">
                                <input type="password" v-model="reg.password" class="inputstyle2"/>
                            </div>
                        </li>

                        <li>
                            <label for="passwd2" class="input-tips2">确认密码：</label>
                            <div class="inputOuter2">
                                <input type="password" v-model="reg.repassword" class="inputstyle2"/>
                            </div>
                        </li>

                        <li>
                            <label for="qq" class="input-tips2">Email：</label>
                            <div class="inputOuter2">
                                <input type="text" v-model="reg.email" class="inputstyle2"/>
                            </div>
                        </li>

                        <li>
                            <label for="qq" class="input-tips2">真实姓名：</label>
                            <div class="inputOuter2">
                                <input type="text" v-model="reg.fullName" maxlength="10" class="inputstyle2"/>
                            </div>
                        </li>

                        <li>
                            <label for="qq" class="input-tips2">手机号：</label>
                            <div class="inputOuter2">
                                <input type="text" v-model="reg.phone" class="inputstyle2"/>
                            </div>
                        </li>

                        <li>
                            <div style="padding-left:90px;margin-top:15px;">
                                <input type="submit" id="reg" value="注 册" style="width:125px;" class="button_blue"/>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <!--注册end-->
    </div>
    <div class="jianyi">*建议使用IE8以上版本浏览器或Chrome内核浏览器</div>
    <p align="center" class="jianyi">©2017 吴耿龙</p>
</div>
</body>
<script type="text/javascript">
    var app = new Vue({
        el: '#app',
        data: {
            login: {
                name: 'admin',
                password: 'admin123456'
            },
            reg: {
                name: 'admin',
                password: 'admin123456',
                repassword: 'admin123456',
                email: 'dylan@163.com',
                fullName: '吴耿龙',
                phone: '15787899999'
            },
            loginMsg: '',
            regMsg: '请注意格式'
        },
        methods: {
            onLogin: function () {
                axios.post("{{ route('login') }}", this.login, {responseType: 'json'})
                    .then(function (response) {
                        if (response.data.code == 0) {
                            window.location.href = response.data.url;
                        } else if (response.data.code == -1) {
                            app.loginMsg = response.data.msg;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            onReg: function () {
                axios.post("{{ route('register') }}", this.reg, {responseType: 'json'})
                    .then(function (response) {
                        if (response.data.code == 0) {
                            alert('注册成功');
                            document.location.href = response.data.url;
                        } else if (response.data.code == -1) {
                            app.regMsg = "<font color='red'><b>×" + response.data.msg + "</b></font>";
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    });
</script>
</html>

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertAuthData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insertauthdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '批量插入权限规则';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $rules = [
//            [
//                'title' => '首页',
//                'url' => 'index',
//                'sort' => 1,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '我的订单',
//                'url' => 'myorder',
//                'sort' => 2,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '订单管理',
//                'url' => 'My/order',
//                'sort' => 3,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '物流管理',
//                'url' => 'My/order',
//                'sort' => 4,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '用户管理',
//                'url' => 'Manage/user',
//                'sort' => 5,
//                'icon' => 'am-icon-user',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '财务管理',
//                'url' => 'My/order',
//                'sort' => 6,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '产品管理',
//                'url' => 'My/order',
//                'sort' => 7,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//            [
//                'title' => '留言管理',
//                'url' => 'My/order',
//                'sort' => 8,
//                'icon' => 'am-icon-home',
//                'status' => 1,
//                'is_deleted' => 0
//            ],
//        ];
        $groups = [
            [
                'title' => '超级管理员',
                'rules' => '[1,2,3,4,5,6,7,8]',
                'status' => 1,
                'is_deleted' => 0
            ],
            [
                'title' => '普通用户',
                'rules' => '[1,2,4,5,6,7,8]',
                'status' => 1,
                'is_deleted' => 0
            ],
            [
                'title' => '运营部门',
                'rules' => '[1,2,3,4,5,6,7,8]',
                'status' => 1,
                'is_deleted' => 0
            ],
            [
                'title' => '财务部门',
                'rules' => '[1,2,3,4,5,6,7,8]',
                'status' => 1,
                'is_deleted' => 0
            ],
            [
                'title' => '仓库部门',
                'rules' => '[1,2,3,4,5,6,7,8]',
                'status' => 1,
                'is_deleted' => 0
            ],
        ];

//        DB::table('rule')->insert($rules);
        DB::table('group')->insert($groups);
        $this->info('添加成功');
    }
}

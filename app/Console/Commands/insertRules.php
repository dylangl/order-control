<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertRules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insertrule';

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
        $rows = [
            [
                'title' => '首页',
                'url' => 'Index/index',
                'sort' => 1,
                'icon' => 'am-icon-home'
            ],
            [
                'title' => '我的订单',
                'url' => 'My/order',
                'sort' => 2,
                'icon' => 'am-icon-home'
            ],
            [
                'title' => '订单管理',
                'url' => 'My/order',
                'sort' => 3,
                'icon' => 'am-icon-home'
            ],
            [
                'title' => '物流管理',
                'url' => 'My/order',
                'sort' => 4,
                'icon' => 'am-icon-home'
            ],
            [
                'title' => '用户管理',
                'url' => 'Manage/user',
                'sort' => 5,
                'icon' => 'am-icon-user'
            ],
            [
                'title' => '财务管理',
                'url' => 'My/order',
                'sort' => 6,
                'icon' => 'am-icon-home'
            ],
            [
                'title' => '产品管理',
                'url' => 'My/order',
                'sort' => 7,
                'icon' => 'am-icon-home'
            ],
            [
                'title' => '留言管理',
                'url' => 'My/order',
                'sort' => 8,
                'icon' => 'am-icon-home'
            ],
        ];

        DB::table('rule')->insert($rows);
        $this->info('添加成功');
    }
}

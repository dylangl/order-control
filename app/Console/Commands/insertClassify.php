<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertClassify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insertclassify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '插入分类';

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
        $data = [
            [
                'name' => "服装",
                'is_deleted' => 0
            ],
            [
                'name' => "汽车、摩托车",
                'is_deleted' => 0
            ],
            [
                'name' => "母婴用品",
                'is_deleted' => 0
            ],
            [
                'name' => "箱包",
                'is_deleted' => 0
            ],
            [
                'name' => "商业及工业",
                'is_deleted' => 0
            ],
            [
                'name' => "数码相机、摄影器材",
                'is_deleted' => 0
            ],
            [
                'name' => "手机壳",
                'is_deleted' => 0
            ],
            [
                'name' => "计算机和网络",
                'is_deleted' => 0
            ],
            [
                'name' => "消费类电子",
                'is_deleted' => 0
            ],
            [
                'name' => "时尚配件",
                'is_deleted' => 0
            ],
            [
                'name' => "电玩游戏",
                'is_deleted' => 0
            ],
            [
                'name' => "发制品",
                'is_deleted' => 0
            ],
            [
                'name' => "保健用品",
                'is_deleted' => 0
            ],
            [
                'name' => "家居与花园",
                'is_deleted' => 0
            ],
            [
                'name' => "珠宝",
                'is_deleted' => 0
            ],
            [
                'name' => "照明灯饰",
                'is_deleted' => 0
            ],
            [
                'name' => "乐器",
                'is_deleted' => 0
            ],
            [
                'name' => "安全与监控",
                'is_deleted' => 0
            ],
            [
                'name' => "鞋类及鞋类辅料",
                'is_deleted' => 0
            ],
            [
                'name' => "运动与户外产品",
                'is_deleted' => 0
            ],
            [
                'name' => "玩具与礼物",
                'is_deleted' => 0
            ],
            [
                'name' => "手表",
                'is_deleted' => 0
            ],
            [
                'name' => "其他产品",
                'is_deleted' => 0
            ],
        ];

        DB::table('classify')->insert($data);
        $this->info('添加成功');
    }
}

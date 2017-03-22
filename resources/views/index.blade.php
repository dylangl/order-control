@extends('layouts.app')

@section('title', '首页')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            管理中心
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li class="am-active">管理中心</li>
        </ol>

        <div class="row">
            <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="am-icon-comments-o"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 1349</div>
                        <div class="desc"> 新消息</div>
                    </div>
                    <a class="more" href="#"> 查看更多
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="am-icon-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 62%</div>
                        <div class="desc"> 收视率</div>
                    </div>
                    <a class="more" href="#"> 查看更多
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="am-icon-apple"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 653</div>
                        <div class="desc"> 苹果设备</div>
                    </div>
                    <a class="more" href="#"> 查看更多
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="am-icon-android"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 786</div>
                        <div class="desc"> 安卓设备</div>
                    </div>
                    <a class="more" href="#"> 查看更多
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="am-u-md-6 am-u-sm-12 row-mb">
                <div class="tpl-portlet">
                    <div class="tpl-portlet-title">
                        <div class="tpl-caption font-green ">
                            <i class="am-icon-cloud-download"></i>
                            <span> 最新留言</span>
                        </div>
                    </div>
                    <div class="tpl-scrollable">111</div>
                </div>
            </div>
            <div class="am-u-md-6 am-u-sm-12 row-mb">
                <div class="tpl-portlet">
                    <div class="tpl-portlet-title">
                        <div class="tpl-caption font-red ">
                            <i class="am-icon-bar-chart"></i>
                            <span> 最新订单</span>
                        </div>
                    </div>
                    <div class="tpl-scrollable">
                        <div class="number-stats">
                            <div class="stat-number am-fl am-u-md-6">
                                <div class="title am-text-right"> Total</div>
                                <div class="number am-text-right am-text-warning"> 2460</div>
                            </div>
                            <div class="stat-number am-fr am-u-md-6">
                                <div class="title"> Total</div>
                                <div class="number am-text-success"> 2460</div>
                            </div>

                        </div>

                        <table class="am-table tpl-table">
                            <thead>
                            <tr class="tpl-table-uppercase">
                                <th>人员</th>
                                <th>余额</th>
                                <th>次数</th>
                                <th>效率</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <img src="{$Think.DS}assets/img/user01.png" alt="" class="user-pic">
                                    <a class="user-name" href="###">禁言小张</a>
                                </td>
                                <td>￥3213</td>
                                <td>65</td>
                                <td class="font-green bold">26%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{$Think.DS}assets/img/user02.png" alt="" class="user-pic">
                                    <a class="user-name" href="###">Alex.</a>
                                </td>
                                <td>￥2635</td>
                                <td>52</td>
                                <td class="font-green bold">32%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{$Think.DS}assets/img/user03.png" alt="" class="user-pic">
                                    <a class="user-name" href="###">Tinker404</a>
                                </td>
                                <td>￥1267</td>
                                <td>65</td>
                                <td class="font-green bold">51%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{$Think.DS}assets/img/user04.png" alt="" class="user-pic">
                                    <a class="user-name" href="###">Arron.y</a>
                                </td>
                                <td>￥657</td>
                                <td>65</td>
                                <td class="font-green bold">73%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{$Think.DS}assets/img/user05.png" alt="" class="user-pic">
                                    <a class="user-name" href="###">Yves</a>
                                </td>
                                <td>￥3907</td>
                                <td>65</td>
                                <td class="font-green bold">12%</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{$Think.DS}assets/img/user06.png" alt="" class="user-pic">
                                    <a class="user-name" href="###">小黄鸡</a>
                                </td>
                                <td>￥900</td>
                                <td>65</td>
                                <td class="font-green bold">10%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
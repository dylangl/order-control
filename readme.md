order-control 订单管理系统
===============

## 简介
之前做了一个ThinkPHP3.2.3版本的，现在这个项目是对之前的进行重构，作为我的毕业设计。这个项目基于Laravel 5.4开发，使用了vue.js 2.0。

## 运行环境
推荐 PHP7.0 Nginx MySQL5.7

## 安装
~~~shell
git clone https://github.com/dylangl/order-control.git
cd order-control
composer update
~~~

修改数据库配置文件
~~~shell
//复制配置文件
cp .env.example .env
//生成应用程序密钥
php artisan key:generate
~~~

运行数据库迁移文件
~~~shell
php artisan migrate
~~~


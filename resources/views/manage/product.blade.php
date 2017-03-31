@extends('layouts.app')

@section('title', '商品管理')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="am-alert am-alert-success"
             style="position: absolute;left:50%;top: 50%;transform: translate(-50%,-50%);z-index:99;display:none"
             data-am-alert></div>
        <div class="tpl-content-page-title">
            商品管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li class="am-active">商品管理</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span> 列表
                </div>
                <div class="tpl-portlet-input tpl-fz-ml">
                    <div class="portlet-input input-small input-inline">
                        <div class="input-icon right">
                            <i class="am-icon-search"></i>
                            <input type="text" class="form-control form-control-solid" placeholder="搜索..."></div>
                    </div>
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <button type="button" class="am-btn am-btn-default" id='addProduct'
                                        data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 500,}">
                                    <span class="am-icon-archive"></span> 添加
                                </button>
                                <button type="button" class="am-btn am-btn-default" id='noPass'>
                                    <span class="am-icon-trash-o"></span> 删除
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form class="am-form">
                            <table class="am-table am-table-striped am-table-hover table-main">
                                <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                    <th class="table-id">id</th>
                                    <th class="table-title">名称</th>
                                    <th class="table-type">品牌</th>
                                    <th class="table-type">价格</th>
                                    <th class="table-author am-hide-sm-only">单位</th>
                                    <th class="table-date am-hide-sm-only">分类</th>
                                    <th class="table-date">图片</th>
                                    <th class="table-date">是否展示</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($list as $user)
                                    <tr>
                                        <td><input type="checkbox" name="uidItem" value="{{ $user->id }}"
                                                   status="{{ $user->status }}"></td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->brand }}</td>
                                        <td>{{ $user->price }}</td>
                                        <td class="am-hide-sm-only">{{ $user->unit }}</td>
                                        <td class="am-hide-sm-only">{{ $user->classify_id }}</td>
                                        <td><img class="am-radius"
                                                 src="{{ \Illuminate\Support\Facades\Storage::url($user->pic) }}"
                                                 width="100" height="100"/>
                                        </td>
                                        <td>{{ getTrueFalseName($user->is_show) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $list->links() }}
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>
    </div>

    <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">添加商品
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd admin-add" id="div-view">
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form id="form1" name="form1" method="post" enctype="multipart/form-data"
                              action="{{ url('manage/product/add') }}"
                              class="am-form am-form-horizontal" data-am-validator>
                            {{ csrf_field() }}
                            <fieldset>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>商品名称*</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='name' type="text" class="am-input-sm" required>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>价格*</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='price' type="text" class="am-input-sm"
                                               pattern="^(?:0\.\d{1,2}|(?!0)\d+(?:\.\d{1,2})?)$" required>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>单位*</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='unit' type="text" pattern="[^x00-xff]" value="个"
                                               class="am-input-sm" required>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>品牌*</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='brand' type="text" class="am-input-sm">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>类别*</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <select id="doc-select-1" name="classifyId" required>
                                            <option value="">选择类别</option>
                                            <option value="服装">服装</option>
                                            <option value="汽车、摩托车">汽车、摩托车</option>
                                            <option value="母婴用品">母婴用品</option>
                                            <option value="箱包">箱包</option>
                                            <option value="商业及工业">商业及工业</option>
                                            <option value="数码相机、摄影器材">数码相机、摄影器材</option>
                                            <option value="手机壳">手机壳</option>
                                            <option value="计算机和网络">计算机和网络</option>
                                            <option value="消费类电子">消费类电子</option>
                                            <option value="时尚配件">时尚配件</option>
                                            <option value="电玩游戏">电玩游戏</option>
                                            <option value="发制品">发制品</option>
                                            <option value="保健用品">保健用品</option>
                                            <option value="家居与花园">家居与花园</option>
                                            <option value="珠宝">珠宝</option>
                                            <option value="照明灯饰">照明灯饰</option>
                                            <option value="乐器">乐器</option>
                                            <option value="安全与监控">安全与监控</option>
                                            <option value="鞋类及鞋类辅料">鞋类及鞋类辅料</option>
                                            <option value="运动与户外产品">运动与户外产品</option>
                                            <option value="玩具与礼物">玩具与礼物</option>
                                            <option value="手表">手表</option>
                                            <option value="其他产品">其他产品</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>重量</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='weight' type="text" class="am-input-sm">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>体积</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='size' type="text" class="am-input-sm">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>图片*</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name="pic" type="file" class="am-input-sm" required>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-3 am-text-right">
                                        <label>备注</label>
                                    </div>
                                    <div class="am-u-sm-8 am-margin-right am-u-end">
                                        <input name='detail' type="text" class="am-input-sm">
                                    </div>
                                </div>

                                <div class="am-margin am-fr">
                                    <button type="submit" class="am-btn am-btn-success am-btn-xs" id="sub1">提交</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    //点击全选框
    var checkAll = $('.tpl-table-fz-check');
    var checkbox = $("tbody :checkbox");
    checkAll.click(function () {
        if ($(this).prop('checked')) {
            checkbox.prop('checked', true);
        } else {
            checkbox.prop('checked', false);
        }
    });

    $("#sub1").click(function () {
        $("#form1").ajaxSubmit({
            type: 'post',
            url: "{{ url('manage/product/add') }}",
            beforeSubmit: function () {
                var numb = 0;
                //表单验证
                $('[pattern]').each(function () {
                    var pattern = new RegExp($(this).attr("pattern"));
                    if (!pattern.test($(this).val())) {
                        numb = numb + 1;
                    }
                });
                $('[required]').each(function () {
                    if ($(this).val() == '') {
                        $(this).focus();
                        numb = numb + 1;
                    }
                });
                if (numb != 0) {
                    return false;
                }
            },
            success: function (data) {
                if (data.status) {
                    $('#doc-modal-1').modal('close');
                    $('.am-alert').attr('class', 'am-alert am-alert-success').html(data.info).fadeIn();
                    setTimeout("$('.am-alert').fadeOut()", 3000);
                    $("<tr id=''><td><input type='checkbox' name='skuitem' value='' status='1'/></td><td>" + $("form [name='sku']").val() + "</td><td>" + $("form [name='titlezh']").val() + "</td><td>" + $("form [name='tag']").val() + "</td><td>" + $("form [name='price']").val() + "</td><td>" + $("form [name='eorizh']").val() + "</td><td>" + $("form [name='unit']").val() + "</td><td>" + $("form [name='remark']").val() + "</td><td>1</td><td>" + $("form [name='pic']").val() + "</td></tr>").insertAfter('.table-main tr:first');
                } else {
                    $('#doc-modal-1').modal('close');
                    $('.am-alert').attr('class', 'am-alert am-alert-danger').html(data.info).fadeIn();
                    setTimeout("$('.am-alert').fadeOut()", 3000);
                }
            },
            error: function (XmlHttpRequest, textStatus, errorThrown) {
                $('.am-alert').attr('class', 'am-alert am-alert-danger').html('出现错误！').fadeIn();
                setTimeout("$('.am-alert').fadeOut()", 3000);
            }
        });
        return false; // 阻止表单自动提交事件
    });
</script>
@endpush


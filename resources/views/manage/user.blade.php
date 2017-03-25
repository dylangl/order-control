@extends('layouts.app')

@section('title', '用户管理')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="am-alert am-alert-success"
             style="position: absolute;left:50%;top: 50%;transform: translate(-50%,-50%);z-index:99;display:none"
             data-am-alert></div>
        <div class="tpl-content-page-title">
            用户管理
        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li class="am-active">用户管理</li>
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
                                <button type="button" class="am-btn am-btn-default" id='pass'>
                                    <span class="am-icon-archive"></span> 审核通过
                                </button>
                                <button type="button" class="am-btn am-btn-default" id='noPass'>
                                    <span class="am-icon-trash-o"></span> 不通过
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
                                    <th class="table-id">uid</th>
                                    <th class="table-title">用户名</th>
                                    <th class="table-type">全名</th>
                                    <th class="table-author am-hide-sm-only">邮箱</th>
                                    <th class="table-date am-hide-sm-only">手机号</th>
                                    <th class="table-date">分组</th>
                                    <th class="table-date am-hide-sm-only">登录时间</th>
                                    <th class="table-date">状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><input type="checkbox" name="uidItem" value="{{ $user->id }}"
                                                   status="{{ $user->status }}"></td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td class="am-hide-sm-only">{{ $user->email }}</td>
                                        <td class="am-hide-sm-only">{{ $user->phone }}</td>
                                        <td>{{ getGroupName($user->group_id) }}</td>
                                        <td class="am-hide-sm-only">{{ $user->created_at }}</td>
                                        <td>{{ getUserStatus($user->status) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
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

    //审核通过
    $('#pass').click(function () {
        var checkbox = $("input[type='checkbox'][name='uidItem']:checked");
        if (checkbox.length == 0) {
            alert("您没有选中未审核的成员！");
            return false;
        } else {
            if (window.confirm("有" + checkbox.length + "个未审核的用户，您确定要审核通过吗？")) {
                var uids = [];
                if (checkbox.length == 1) {
                    uids[0] = checkbox.val();
                    checkbox.parent().parent().find("td:last").html('审核通过');
                } else {
                    checkbox.each(function () {
                        uids.push($(this).val());
                        $(this).parent().parent().find("td:last").html('审核通过');
                    })
                }
                $.get("{{ url('manage/user/verify') }}" + '?status=1&uids=' + uids, function (data) {
                    console.log(data);
                    if (data.code == 0) {
                        $('.am-alert').attr('class', 'am-alert am-alert-success').html(data.msg).fadeIn();
                        setTimeout("$('.am-alert').fadeOut()", 3000);
                    } else {
                        $('.am-alert').attr('class', 'am-alert am-alert-danger').html(data.msg).fadeIn();
                        setTimeout("$('.am-alert').fadeOut()", 3000);
                    }
                });
            }
        }
    });

    //审核不通过
    $('#noPass').click(function () {
        var checkbox = $("input[type='checkbox'][name='uidItem']:checked");
        if (checkbox.length == 0) {
            alert("您没有选中未审核的成员！");
            return false;
        } else {
            if (window.confirm("有" + checkbox.length + "个未审核的用户，您确定要审核通过吗？")) {
                var uids = [];
                if (checkbox.length == 1) {
                    uids[0] = checkbox.val();
                    checkbox.parent().parent().find("td:last").html('审核不通过');
                } else {
                    checkbox.each(function () {
                        uids.push($(this).val());
                        $(this).parent().parent().find("td:last").html('审核不通过');
                    })
                }
                $.get("{{ url('manage/user/verify') }}" + '?status=2&uids=' + uids, function (data) {
                    console.log(data);
                    if (data.code == 0) {
                        $('.am-alert').attr('class', 'am-alert am-alert-success').html(data.msg).fadeIn();
                        setTimeout("$('.am-alert').fadeOut()", 3000);
                    } else {
                        $('.am-alert').attr('class', 'am-alert am-alert-danger').html(data.msg).fadeIn();
                        setTimeout("$('.am-alert').fadeOut()", 3000);
                    }
                });
            }
        }
    });
</script>
@endpush


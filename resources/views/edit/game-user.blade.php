<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>帐号操作</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{ asset('layuiadmin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('layuiadmin/style/admin.css') }}" media="all">
</head>

<body>

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">帐号操作</div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="">
                    <div class="layui-inline">
                        <label class="layui-form-label">用户账号</label>
                        <div class="layui-input-inline">
                            <input type="number" name="f_account_id" placeholder="请输入用户账号" autocomplete="off" class="layui-input">

                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">游戏ID</label>
                        <div class="layui-input-inline">
                            <input type="number" name="f_role_id" placeholder="请输入游戏ID" autocomplete="off" class="layui-input">

                        </div>
                    </div>
                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <button class="layui-btn" lay-submit lay-filter="formQuery">查询</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="layui-inline">
                    <label class="layui-form-label">用户昵称</label>
                    <div class="layui-input-inline">
                        <input type="text" id="f_nick_name" style="border:0; color:green" autocomplete="off" class="layui-input">

                    </div>
                </div><br><br>
                <form class="layui-form" action="">

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">重置手机号</label>
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="resetPhone">重置</button>
                        </div>
                    </div>
                </form>

                <form class="layui-form" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">重置密码</label>
                        <div class="layui-input-block">
                            <input type="radio" name="password" value="1" title="是">
                            <input type="radio" name="password" value="0" title="否" checked>
                        </div>
                    </div>
                </form>
                <form class="layui-form" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">重置钱庄密码</label>
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit>重置</button>
                        </div>
                    </div>
                </form>
                <form class="layui-form" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">启用帐号算法</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="switch" lay-skin="switch" lay-text="开|关">
                        </div>
                    </div>
                </form>
                <form class="layui-form" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label">帐号封禁</label>
                        <div class="layui-input-block">
                            <select name="city" lay-verify="required">
                                <option value=""></option>
                                <option value="0">1天</option>
                                <option value="1">3天</option>
                                <option value="2">7天</option>
                                <option value="3">30天</option>
                                <option value="4">365天</option>
                                <option value="4">永久封禁</option>
                                <option value="4">解除封禁</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
    </div>


    <script src="/layuiadmin/layui/layui.js"></script>
    <script>
        layui.config({
            base: '../../../layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'form', 'laydate'], function() {
            var $ = layui.$,
                admin = layui.admin,
                element = layui.element,
                layer = layui.layer,
                laydate = layui.laydate,
                form = layui.form;




            form.on('submit(formQuery)', function(msg) {

                var f_role_id = msg.field.f_role_id;
                var f_account_id = msg.field.f_account_id;
                //console.log(f_role_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/query/user')}}",
                    type: 'post',
                    data: {
                        'f_role_id': f_role_id,
                        'f_account_id': f_account_id
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.status == 200) {
                            f_role_id = res.f_role_id;
                            layer.msg("查询成功", {
                                icon: 1
                            });

                            $('#f_nick_name').val(res.f_nick_name);

                            form.on('submit(resetPhone)', function(msg) {

                                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/reset/phone')}}",
                    type: 'post',
                    data: {
                        'f_role_id': f_role_id
                    
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.status == 200) {
                          
                            layer.msg("查询成功", {
                                icon: 1
                            });

                            $('#f_nick_name').val(res.f_nick_name);

                            form.on('submit(resetPhone)', function(msg) {
                                console.log(f_role_id);
                                return false;
                            });


                        } else if (res.status == 403) {
                            layer.msg("查询不到用户", {
                                icon: 5
                            });
                        } else {
                            layer.msg("查询失败", {
                                icon: 5
                            });
                        }
                    }
                });
                                return false;
                            });


                        } else if (res.status == 403) {
                            layer.msg("查询不到用户", {
                                icon: 5
                            });
                        } else {
                            layer.msg("查询失败", {
                                icon: 5
                            });
                        }
                    }
                });
                return false;
            });


        });
    </script>
</body>

</html>
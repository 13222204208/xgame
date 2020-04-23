<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>帐号操作</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入用户账号" autocomplete="off" class="layui-input">

                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">游戏ID</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入游戏ID" autocomplete="off" class="layui-input">

                        </div>
                    </div>
                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <button class="layui-btn" lay-submit lay-filter="formDemo">查询</button>
                        </div>
                    </div>
                </form>
                <br>
                <form class="layui-form" action="">

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">重置手机号</label>
                        <div class="layui-input-block">
                            <input type="radio" name="phone" value="1" title="是">
                            <input type="radio" name="phone" value="0" title="否" checked>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">重置密码</label>
                        <div class="layui-input-block">
                            <input type="radio" name="password" value="1" title="是">
                            <input type="radio" name="password" value="0" title="否" checked>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">重置钱庄密码</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="1" title="是">
                            <input type="radio" name="sex" value="0" title="否" checked>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width:90px">启用帐号算法</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="switch" lay-skin="switch" lay-text="开|关">
                        </div>
                    </div>

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




                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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

            form.render(null, 'component-form-group');

            laydate.render({
                elem: '#LAY-component-form-group-date'
            });

            /* 自定义验证规则 */
            form.verify({
                title: function(value) {
                    if (value.length < 5) {
                        return '标题至少得5个字符啊';
                    }
                },
                pass: [/(.+){6,12}$/, '密码必须6到12位'],
                content: function(value) {
                    layedit.sync(editIndex);
                }
            });

            /* 监听指定开关 */
            form.on('switch(component-form-switchTest)', function(data) {
                layer.msg('开关checked：' + (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });

            /* 监听提交 */
            form.on('submit(component-form-demo1)', function(data) {
                parent.layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });
        });
    </script>
</body>

</html>
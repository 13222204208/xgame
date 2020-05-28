

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>创建帐号</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('layuiadmin/layui/css/layui.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('layuiadmin/style/admin.css') }}" media="all">
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">创建帐号</div>
          <div class="layui-card-body" pad15>
            
            <div class="layui-form" lay-filter="">
              <div class="layui-form-item">
                <label class="layui-form-label">角色选择</label>
                <div class="layui-input-inline">
                  <select name="role" lay-verify="">
                    <option value="1" disabled>超级管理员</option>
                    <option value="普通管理员" selected>普通管理员</option>
<!--                     <option value="审核员" selected>审核员</option>
                    <option value="编辑人员" selected>编辑人员</option> -->
                  </select> 
                </div>

              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                  <input type="text" name="username" value="" lay-verify="username" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                  <input type="password" name="password" lay-verify="pass" lay-verType="tips" autocomplete="off" id="LAY_password" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">8到16个字符</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                  <input type="password" name="repassword" lay-verify="repass" lay-verType="tips" autocomplete="off" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="setmyinfo">确认创建</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/layuiadmin/layui/layui.js"></script>
  <script src="/layuiadmin/layui/jquery3.2.js"></script>
  <script> 
    layui.config({
      base: '/layuiadmin/'
    }).extend({
      index: 'lib/index' 
    }).use(['index', 'user'], function() {

      var form = layui.form;
      form.verify({

                username: function(value){
                    if(value.length < 6){
                        return '用户名至少得6个字符啊';
                    }
                }, 
                
                password: function(value){
                    if(value.length < 8){
                        return '请输入至少8位';
                    }
                },
                //phone: [/^1[3|4|5|7|8]\d{9}$/, '手机必须11位，只能是数字！'],
                //email: [/^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$/, '邮箱格式不对']
      });

      var $ = layui.$,
        setter = layui.setter,
        admin = layui.admin,
        form = layui.form,
        router = layui.router(),
        search = router.search;

      form.render();

      //提交
      form.on('submit(setmyinfo)', function(obj) {
       
        $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "{{url('add/newuser')}}",
          method: 'POST',
          data: obj.field,
          dataType: 'json',
          success: function(res) {
          
            if (res.status == 404) {
              layer.msg('用户名密码不一致',{
                offset: '15px',
                icon: 2,
                time: 3000
              }, function(){ alert(404);
                location.href= '/set/user/newuser';
              })
            }

            if (res.status == 200) {
              layer.msg('添加成功',{
                offset: '15px',
                icon: 1,
                time: 3000
              }, function(){
                location.href= '/set/user/newuser';
              })
            }else if (res.status == 403) {
   
              layer.msg('添加失败',{
                offset: '15px',
                icon: 2,
                time: 3000
              }, function(){
                location.href= '/set/user/newuser';
              })
            }
          },
          error: function(error) {
            alert(error);
            layer.msg('添加失败',{
                offset: '15px',
                icon: 2,
                time: 3000
              }, function(){
                location.href= '/set/user/newuser';
              })
          }
        });
      });
    });
  </script>
</body>
</html>
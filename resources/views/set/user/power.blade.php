

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>添加权限</title>
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
          <div class="layui-card-header">添加权限</div>
          <div class="layui-card-body" pad15>
            
            <div class="layui-form" lay-filter="">
              <div class="layui-form-item">
                <label class="layui-form-label">角色选择</label>
                <div class="layui-input-inline">
                  <select name="role" lay-verify="">
                    <option value="1" disabled>超级管理员</option>
                    <option value="普通管理员" selected>普通管理员</option>
              <!--       <option value="审核员" selected>审核员</option>
                    <option value="编辑人员" selected>编辑人员</option> -->
                  </select> 
                </div>

              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">权限名称</label>
                <div class="layui-input-inline">
                  <input type="text" name="powername" value="" lay-verify="role"  class="layui-input">
                </div>
              </div>


              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="setmyinfo">添加权限</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>


  <table id="demo" lay-filter="test"></table>


  <script src="/layuiadmin/layui/layui.js"></script>
  <script src="/layuiadmin/layui/jquery3.2.js"></script>
  <script> 
    layui.config({
      base: '/layuiadmin/'
    }).extend({
      index: 'lib/index' 
    }).use(['index', 'user','table'], function() {

      var form = layui.form;

      var table = layui.table;


      //第一个实例
      table.render({
        elem: '#demo',
        height: 600,
        url: "{{url('/get/back/users')}}" //数据接口
          ,
        page: true //开启分页
          ,
        cols: [
          [ //表头
            {
              field: 'username',
              title: '管理员用户名',
              width: 280,
              align: 'center',
              sort: true
            }, {
              field: 'created_at',
              title: '创建时间',
              align: 'center',
              width: 180
            }
          ]
         
        ],  
        parseData: function(res) { //res 即为原始返回的数据
          console.log(res);
          return {
            "code": '0', //解析接口状态
            "msg": res.message, //解析提示文本
            "count": res.total, //解析数据长度
            "data": res.data //解析数据列表
          }
        },
        toolbar: '#toolbarDemo',
        title: '后台广告管理',
        totalRow: true

      });

      form.verify({

                
                role: function(value){
                    if(value.length < 2){
                        return '请输入至少4位';
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
          url: "{{url('add/role')}}",
          method: 'POST',
          data: obj.field,
          dataType: 'json',
          success: function(res) {

            if (res.status == 200) {
              layer.msg('创建成功',{
                offset: '15px',
                icon: 1,
                time: 2000
              }, function(){
                location.href= '/set/user/power';
              })
            }else if (res.status == 403) {
   
              layer.msg('创建失败',{
                offset: '15px',
                icon: 1,
                time: 3000
              }, function(){
                location.href= '/set/user/power';
              })
            }
          },
          error: function(error) {
     
            layer.msg('创建失败',{
                offset: '15px',
                icon: 1,
                time: 3000
              }, function(){
                location.href= '/set/user/power';
              })
          }
        });
      });
    });
  </script>
</body>
</html>
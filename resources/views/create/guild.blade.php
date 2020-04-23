

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>创建公会</title>
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
      <div class="layui-card-header">创建公会</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group">
          <div class="layui-form-item">
            <label class="layui-form-label">公会名称</label>
            <div class="layui-input-block">
              <input type="text" name="f_name" lay-verify="title" autocomplete="off" placeholder="请输入公会名称 最多七个字符" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">会长名称</label>
            <div class="layui-input-block">
              <input type="text" name="f_huizhang_name" lay-verify="title" autocomplete="off" placeholder="请输入会长名称 最多七个字符" class="layui-input">
            </div>
          </div>
  
          
          <div class="layui-col-md6">
              <label class="layui-form-label">选择旗帜</label>
              <div class="layui-input-block">
                  <select  id="photo"  lay-filter="photo" name="f_guild_icon_id" v-model="iotAssertSensorType.photo">
                      <option value="1" selected="selected">第一种旗帜</option>
                      <option value="2">第二种旗帜</option>
                      <option value="3">第三种旗帜</option>
                      <option value="4">第四种旗帜</option>
                      <option value="5">第五种旗帜</option>
                      <option value="6">第六种旗帜</option>
                      <option value="7">第七种旗帜</option>
                      <option value="8">第八种旗帜</option>
                  </select>
              </div>

              <img name="photoImg" :src="iotAssertSensorType.photo" style="margin-left: 25%" >
          </div>

          
          
        
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">公会公告</label>
            <div class="layui-input-block">
              <textarea name="f_announcement" placeholder="请输入公告内容,如需换行请加 \n" class="layui-textarea"></textarea>
            </div>
          </div>        
          <div class="layui-form-item layui-layout-admin">
            <div class="layui-input-block">
              <div class="layui-footer" style="left: 0;">
                <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

    
  <script src="/layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
    base: '../../../layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form', 'laydate'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form;
    
    form.render(null, 'component-form-group');

    laydate.render({
      elem: '#LAY-component-form-group-date'
    });

    form.on('select(photo)', function(data){
    document.photoImg.src='/flag/'+data.value+'.PNG';

    });
    
    /* 自定义验证规则 */
    form.verify({
      f_name: function(value){
        if(value.length > 9){
          return '公会名称最多七个字符';
        }
      },
      f_huizhang_name: function(value){
        if(value.length > 9){
          return '会长名称最多七个字符';
        }
      },
    });
    

    
    /* 监听提交 */
    form.on('submit(component-form-demo1)', function(data){ console.log(data);
      var data = data.field;
$.ajax( {
       headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "{{url('add/guild')}}",
        method: 'POST',
        data: data,
        success: function(res) {
          console.log(res);
          if (res == '{"status":200}') {
          layer.msg('添加成功',{
            offset: '15px',
            icon: 1,
            time: 3000
          }, function(){
            location.href= "{{url('/create/guild')}}";
          })
          }else{
            console.log(res);
          layer.msg('添加失败',{
            offset: '15px',
            icon: 2,
            time: 3000
          })
          }
        },
        error: function(error) {
          console.log(error);
          layer.msg('添加失败请重新确认',{
            offset: '15px',
            icon: 2,
            time: 3000
          })
        }
        });
return false;
});
    
    });

  </script>
</body>
</html>

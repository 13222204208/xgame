

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>添加跑马灯</title>
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
      <div class="layui-card-header">添加跑马灯</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group">
 
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容编辑</label>
            <div class="layui-input-block">
              <textarea name="f_text" required placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
          </div>  

          <div class="layui-form-item">
            <label class="layui-form-label">选择框</label>
            <div class="layui-input-block">
              <select name="f_weights" required lay-verify="required">
                <option value=""></option>
                <option value="3">停服公告</option>
                <option value="2">重大更新</option>
                <option value="1">普通消息</option>
         
              </select>
            </div>
          </div>
          

          
          <div class="layui-form-item">

            <div class="layui-inline">
              <label class="layui-form-label">播放时间</label></label>
              <div class="layui-input-inline">
                <input type="text" required name="f_opentime" id="LAY-component-form-start-time" lay-verify="time" placeholder="HH-MM-SS" autocomplete="off" class="layui-input">
              </div>
            </div>

            <div class="layui-inline">
              <label class="layui-form-label">结束时间</label></label>
              <div class="layui-input-inline">
                <input type="text" required name="f_closetime" id="LAY-component-form-over-time" lay-verify="time" placeholder="HH-MM-SS" autocomplete="off" class="layui-input">
              </div>
            </div>
 
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">间隔时间</label>
              <div class="layui-input-inline">
                <input type="text" required name="f_waitime" lay-verify="number" placeholder="秒为单位" autocomplete="off" class="layui-input">
              </div>
            </div>
         
          </div>
                    
          <div class="layui-form-item">

            <div class="layui-inline">
              <label class="layui-form-label">播放日期</label></label>
              <div class="layui-input-inline">
                <input type="text" required name="f_openday" id="LAY-component-form-start-date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
              </div>
            </div>

            <div class="layui-inline">
              <label class="layui-form-label">结束日期</label></label>
              <div class="layui-input-inline">
                <input type="text" required name="f_closeday" id="LAY-component-form-over-date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
              </div>
            </div>
          </div>
          
          <div class="layui-form-item ">
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
      elem: '#LAY-component-form-start-time',
      type: 'time'
    });

    laydate.render({
      elem: '#LAY-component-form-over-time',
      type: 'time'
    });
    
    laydate.render({
      elem: '#LAY-component-form-start-date',
      type: 'date'
    });

    laydate.render({
      elem: '#LAY-component-form-over-date',
      type: 'date'
    });
    

    
    /* 监听提交 */
    form.on('submit(component-form-demo1)', function(data){
      var data = data.field;

      $.ajax({
						headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									},
							url: "{{url('add/horse')}}",
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
									location.href= "{{url('/create/horse')}}";
								})
								}else{
									console.log(res);
								layer.msg('添加失败,日期间隔必须大于一天或等于一天',{
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

<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 控制台主页一</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/game/Public/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/game/Public/layuiadmin/style/admin.css" media="all">
</head>
<body>
  
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md8">
      	<?php if(is_array($con)): foreach($con as $key=>$vo): ?><form class="layui-form" action="" method="post" lay-filter="component-form-group" enctype="multipart/form-data">
         <input name="id" value="<?php echo ($vo["id"]); ?>" type="hidden" />
         <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-input-block">
              <input type="text" name="user" value="<?php echo ($vo["user"]); ?>" lay-verify="user" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="text" name="pwd" value="<?php echo ($vo["pwd"]); ?>" lay-verify="pwd" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
           <button class="layui-btn" style="width: 200px;margin-left: 110px;">修改</button>
            </div>
        </form><?php endforeach; endif; ?>
      </div>
      
      
    </div>
  </div>

  <script src="/game/Public/layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
    base: '/game/Public/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,form = layui.form;
    
    form.render(null, 'component-form-element');
    element.render('breadcrumb', 'breadcrumb');
    
    form.on('submit(component-form-element)', function(data){
      layer.msg(JSON.stringify(data.field));
      return false;
    });
  });
  </script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 控制台主页一</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/style/admin.css" media="all">
</head>
<body>
  
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md8">
      	<?php if(is_array($con)): foreach($con as $key=>$vo): ?><form class="layui-form" action="" method="post" lay-filter="component-form-group">
        	<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
          <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
              <input type="text" name="mingcheng" value="<?php echo ($vo["mingcheng"]); ?>" lay-verify="mingcheng" autocomplete="off" placeholder="请输入供货商名称" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">地址</label>
            <div class="layui-input-block">
              <input type="text" name="dizhi" value="<?php echo ($vo["dizhi"]); ?>" lay-verify="dizhi" autocomplete="off" placeholder="请输入地址" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">电话</label>
            <div class="layui-input-block">
              <input type="text" name="phone" value="<?php echo ($vo["phone"]); ?>" lay-verify="phone" autocomplete="off" placeholder="请输人电话" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
           <button class="layui-btn" style="width: 200px;margin-left: 110px;">编辑</button>
            </div>
        </form><?php endforeach; endif; ?>
      </div>
      
      
    </div>
  </div>

  <script src="/kucun/Public/layuiadmin/layui/layui.js"></script>  
</body>
</html>
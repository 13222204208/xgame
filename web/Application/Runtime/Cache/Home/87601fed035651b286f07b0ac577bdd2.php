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
      	<?php if(is_array($con)): foreach($con as $key=>$vo): ?><form class="layui-form" action="" method="post" lay-filter="component-form-group" enctype="multipart/form-data">
         <input name="id" value="<?php echo ($vo["id"]); ?>" type="hidden" />
         <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
              <input type="text" name="mingcheng" value="<?php echo ($vo["mingcheng"]); ?>" lay-verify="mingcheng" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">尺寸</label>
            <div class="layui-input-block">
              <input type="text" name="chicun" value="<?php echo ($vo["chicun"]); ?>" lay-verify="chicun" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">颜色</label>
            <div class="layui-input-block">
              <input type="text" name="yanse" value="<?php echo ($vo["yanse"]); ?>" lay-verify="yanse" autocomplete="off" placeholder="请输人" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">厂家货号</label>
            <div class="layui-input-block">
              <input type="text" name="cj_huohao" value="<?php echo ($vo["cj_huohao"]); ?>" lay-verify="cj_huohao" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">自己货号</label>
            <div class="layui-input-block">
              <input type="text" name="zj_huohao" value="<?php echo ($vo["zj_huohao"]); ?>" lay-verify="zj_huohao" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">单价</label>
            <div class="layui-input-block">
              <input type="text" name="danjia" value="<?php echo ($vo["danjia"]); ?>" lay-verify="danjia" autocomplete="off" placeholder="请输人" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">批发价</label>
            <div class="layui-input-block">
              <input type="text" name="pifa" value="<?php echo ($vo["pifa"]); ?>" lay-verify="pifa" autocomplete="off" placeholder="请输人" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">零售价</label>
            <div class="layui-input-block">
              <input type="text" name="lingshou" value="<?php echo ($vo["lingshou"]); ?>" lay-verify="lingshou" autocomplete="off" placeholder="请输人" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">数量</label>
            <div class="layui-input-block">
              <input type="text" name="num" value="<?php echo ($vo["num"]); ?>" lay-verify="num" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
          	<label class="layui-form-label">供货商</label>
          	 <div class="layui-input-block">
              <select name="gonghuoshang" lay-verify="">
                  <option value="<?php echo ($vo["gonghuoshang"]); ?>" ><?php echo ($vo["gonghuoshang"]); ?></option>
                <?php if(is_array($gh)): foreach($gh as $key=>$v): ?><option value="<?php echo ($v["mingcheng"]); ?>" ><?php echo ($v["mingcheng"]); ?></option><?php endforeach; endif; ?>
              </select>
               </div>
            </div>
          <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
            <div class="layui-input-block">
              <input type="file" name="photo" lay-verify="photo" autocomplete="off" placeholder="请输人电话" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
           <button class="layui-btn" style="width: 200px;margin-left: 110px;">修改</button>
            </div>
        </form><?php endforeach; endif; ?>
      </div>
      
      
    </div>
  </div>

  <script src="/kucun/Public/layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
    base: '/kucun/Public/layuiadmin/' //静态资源所在路径
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
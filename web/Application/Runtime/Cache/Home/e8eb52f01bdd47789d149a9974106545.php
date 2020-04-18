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
        <form class="layui-form" action="" method="post" lay-filter="component-form-group">
          <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
              <input type="text" name="mingcheng" lay-verify="mingcheng" autocomplete="off" placeholder="请输入店员名称" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-input-block">
              <input type="text" name="zhanghao" lay-verify="zhanghao" autocomplete="off" placeholder="请输入账号" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="text" name="mima" lay-verify="mima" autocomplete="off" placeholder="请输人密码" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
           <button class="layui-btn" style="width: 200px;margin-left: 110px;">添加</button>
            </div>
        </form>
      </div>
      
      
    </div>
  </div>

  <script src="/game/Public/layuiadmin/layui/layui.js"></script>  
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>登入 </title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/style/login.css" media="all">
  <style> 
  	button{
  		width: 80%;
  		margin-left: 10%;
  	}
  </style>
</head>
<body>

  <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
      <div class="layadmin-user-login-box layadmin-user-login-header">
        <h2></h2>
        <!--<p>layui 官方出品的单页面后台管理模板系统</p>-->
      </div>
				<br /><br /><br /><br />
				<a href="/kucun/index.php/Home/Login/phone_login"><button class="layui-btn layui-btn-radius ">我是店员</button></a>
				
				<br /><br /><br /><br /><br /><br />
					<a href="/kucun/index.php/Home/Login/admin_login"><button class="layui-btn layui-btn-radius ">我是店主</button></a>
		
    </div>
    

    
  </div>

  <script src="/kucun/Public/layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
    base: '/kucun/Public/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'user'], function(){
    var $ = layui.$
    ,setter = layui.setter
    ,admin = layui.admin
    ,form = layui.form
    ,router = layui.router()
    ,search = router.search;

    form.render();
    
  });
  </script>
</body>
</html>
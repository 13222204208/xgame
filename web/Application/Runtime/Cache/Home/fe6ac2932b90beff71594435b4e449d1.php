<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>layuiAdmin 控制台主页一</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="/Public/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/Public/layuiadmin/style/admin.css" media="all">
	</head>

	<body>

		<div class="layui-fluid" style="padding: 50px;">
			<div class="layui-row layui-col-space15">
				救援金比例:<input class="layui-input" style="width: 200px;display: inline-block;" /><button style="display: inline-block;" class="layui-btn">确定</button>
			</div>
		</div>

		<script src="/Public/layuiadmin/layui/layui.js"></script>
		<script src="/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');

			function del_gh(id) {
				if(confirm('确定删除吗?')) {
					$.get('/index.php/Home/Huodong/del_gh', {
						id: id
					}, function(data) {
						window.location.reload();
					})
				}
			}
		</script>
	</body>

</html>
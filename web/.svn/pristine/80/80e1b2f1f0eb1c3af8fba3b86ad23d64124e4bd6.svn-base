<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

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
		<div style="padding: 20px;">
			<table id="demo" lay-filter="demo"></table>
		</div>
		
	
	
	
		<script src="/game/Public/layuiadmin/layui/layui.js"></script>
		<script src="/game/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/game/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');
				
			layui.use(['table', 'layer'], function() {
				var table = layui.table;
				var layer = layui.layer;
				//第一个实例
				table.render({
					elem: '#demo',
					height: 712,
					width:2000,
					url: '/game/index.php/Home/Houtai/userlist' //数据接口
						,
					//toolbar: '#toolbarDemo',
					cols: [
						[ //表头
							{
								field: 'f_username',
								title: '本局盈利',
								width: 150,
								sort: true
			
							}, {
								field: 'f_account_id',
								width: 150,
								title: '本局总压'
								
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '本局总得',								
								sort: true
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '时间',								
								sort: true
							}

						]
					]
				});
				//监听工具条
				table.on('tool(demo)', function(obj) {
					var data = obj.data;
					//if(obj.event === 'detail') {
					//	layer.msg('ID：' + data.id + ' 的查看操作');
					//} else 
					if(obj.event === 'del') {
						layer.confirm('真的删除么', function(index) {
							layer.msg(data.id);
							//obj.del();
							//layer.close(index);
						});
					} else if(obj.event === 'edit'){
						layer.alert('编辑行：<br>' + JSON.stringify(data));
					}
				});
				$('.demoTable .layui-btn').on('click', function() {
					var type = $(this).data('type');
					active[type] ? active[type].call(this) : '';
				});
			});

			function del_gh(id) {
				if(confirm('确定删除吗?')) {
					$.get('/game/index.php/Home/Houtai/del_gh', {
						id: id
					}, function(data) {
						window.location.reload();
					})
				}
			}
		</script>
	</body>
</html>
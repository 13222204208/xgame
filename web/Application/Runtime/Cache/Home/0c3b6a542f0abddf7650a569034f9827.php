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
		<style>
			.layui-card {
				margin-left: 20px;
			}
		</style>
	</head>

	<body>
		<div class="layui-col-md12" style="padding: 30px;">
			<form class="layui-form" action="" style="width: 60%;">
				<div class="layui-form-item">
					<label class="layui-form-label">赢利点</label>
					<div class="layui-input-block">
						<input type="text" name="title" required lay-verify="required" placeholder="请输入赢利点" autocomplete="off" class="layui-input" style="display: inline-block;width: 60%;">‰
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">死鱼概率</label>
					<div class="layui-input-block">
						<input type="text" name="title" required lay-verify="required" placeholder="请输入概率" autocomplete="off" class="layui-input" style="display: inline-block;width: 60%;">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">金豆设置</label>
					<div class="layui-input-block">
						<input type="text" name="title" value="1" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="title" value="10" class="layui-input" style="width: 50px;display: inline-block;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="title" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="title" value="11" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="title" value="20" class="layui-input" style="width: 50px;display: inline-block;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="title" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="title" value="21" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="title" value="30" class="layui-input" style="width: 50px;display: inline-block;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="title" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="title" value="31" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="title" value="40" class="layui-input" style="width: 50px;display: inline-block;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="title" value="1.3" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="title" value="41" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="title" value="50" class="layui-input" style="width: 50px;display: inline-block;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="title" value="1.3" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
				</div>			
				<div class="layui-form-item">
					<label class="layui-form-label">跑马灯条件</label>
					<div class="layui-input-block">
						击杀<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">倍数的鱼
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">奖池操作</label>
					<div class="layui-input-block">
						<input type="text" name="title" value="初级场" class="layui-input" style="width: 80px;display: inline-block;">场&nbsp;&nbsp;&nbsp;
						<input type="text" name="title" value="03" class="layui-input" style="width: 80px;display: inline-block;">桌&nbsp;&nbsp;&nbsp;
						当前奖池:200000分
						<br /><br />增加<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
						减少<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
						<button type="button" class="layui-btn">一键清空</button>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">自动踢出</label>
					<div class="layui-input-block">
						<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">分钟未开炮自动踢出、<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">分钟内总开炮不超过<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">发自动踢出
						<br /><br />连续被踢出<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">次时<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">分钟禁止进入此桌
					</div>
				</div>
				
				<br /><br />
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>

		</div>

		<script src="/game/Public/layuiadmin/layui/layui.js"></script>
		<script src="/game/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/game/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');
			layui.use('form', function() {
				var form = layui.form;

				//监听提交
				form.on('submit(formDemo)', function(data) {
					layer.msg(JSON.stringify(data.field));
					return false;
				});
			});

			function del_gh(id) {
				if(confirm('确定删除吗?')) {
					$.get('/game/index.php/Home/Game/del_gh', {
						id: id
					}, function(data) {
						window.location.reload();
					})
				}
			}
		</script>
	</body>

</html>
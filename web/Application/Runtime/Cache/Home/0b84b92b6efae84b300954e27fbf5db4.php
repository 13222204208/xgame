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

		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<form class="layui-form" action="">
					<div class="layui-inline">
						<label class="layui-form-label">用户账号</label>
						<div class="layui-input-inline">
							<input type="text" name="title" required lay-verify="required" placeholder="请输入用户账号" autocomplete="off" class="layui-input">

						</div>
					</div>
					<div class="layui-inline">
						<label class="layui-form-label">游戏ID</label>
						<div class="layui-input-inline">
							<input type="text" name="title" required lay-verify="required" placeholder="请输入游戏ID" autocomplete="off" class="layui-input">

						</div>
					</div>
					<div class="layui-inline">
						<div class="layui-input-inline">
							<button class="layui-btn" lay-submit lay-filter="formDemo">查询</button>
						</div>
					</div>
				</form>
				<div class="layui-col-md12">
					<div class="layui-card-body">
						<form class="layui-form" action="">
							<!-- <div class="layui-form-item">
								<label class="layui-form-label">金币操作</label>
								<div class="layui-inline">
									<button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">+</i></button></div>
								<div class="layui-inline">
									<input type="text" name="title" value="100" class="layui-input" style="width: 50px;">
								</div>
								<div class="layui-inline">
									<button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">-</i></button></div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">等级操作</label>
								<div class="layui-inline">
									<button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">+</i></button></div>
								<div class="layui-inline">
									<input type="text" name="title" value="10" class="layui-input" style="width: 50px;">
								</div>
								<div class="layui-inline">
									<button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">-</i></button></div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">洗码量操作</label>
								<div class="layui-inline">
									<button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">+</i></button></div>
								<div class="layui-inline">
									<input type="text" name="title" value="100" class="layui-input" style="width: 50px;">
								</div>
								<div class="layui-inline">
									<button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon">-</i></button></div>
							</div> -->
							<div class="layui-form-item">
							    <label class="layui-form-label" style="width: 90px;">重置手机号</label>
							    <div class="layui-input-block">
							      <input type="radio" name="sex" value="是" title="是" >
							      <input type="radio" name="sex" value="否" title="否" checked="checked">
							    </div>
							  </div>
							  <div class="layui-form-item">
							      <label class="layui-form-label" style="width: 90px;">重置密码</label>
							      <div class="layui-input-block">
							        <input type="radio" name="sex1" value="是" title="是" >
							        <input type="radio" name="sex1" value="否" title="否" checked="checked">
							      </div>
							    </div>
								<div class="layui-form-item">
								    <label class="layui-form-label" style="width: 90px;">重置钱庄密码</label>
								    <div class="layui-input-block">
								      <input type="radio" name="sex2" value="是" title="是" >
								      <input type="radio" name="sex2" value="否" title="否" checked="checked">
								    </div>
								  </div>
							<div class="layui-form-item">
								<label class="layui-form-label" style="width: 90px;">启用账号算法</label>
								<div class="layui-input-block">
									<input type="checkbox" name="switch" lay-skin="switch" lay-text="开启|关闭">
								</div>
							</div>
							<div class="layui-form-item" style="width: 50%;">
								<label class="layui-form-label">账号封禁</label>
								<div class="layui-input-block">
									<select name="city" lay-verify="required">
										<option value=""></option>
										<option value="0">1天</option>
										<option value="1">3天</option>
										<option value="2">7天</option>
										<option value="3">30天</option>
										<option value="4">356天</option>
										<option value="3">永久封禁</option>
										<option value="4">解除封禁</option>
									</select>
								</div>
							</div>

							<div class="layui-form-item">
								<div class="layui-input-block">
									<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
									<button type="reset" class="layui-btn layui-btn-primary">重置</button>
								</div>
							</div>
						</form>
					</div>
				</div>

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

			//Demo
			layui.use('form', function() {
				var form = layui.form;

				//监听提交
				form.on('submit(formDemo)', function(data) {
					layer.msg(JSON.stringify(data.field));
					return false;
				});
			});
		</script>
	</body>

</html>
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

		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<h2>会员日奖励</h2>
				<button class="layui-btn layui-btn-normal" style="display: inline-block;">新建</button>
				<div class="layui-col-md12">
					<div class="layui-card-body" style="height: 300px;overflow-y: scroll;">
						<table class="layui-table">
							<thead>
								<tr>
									<th>从等级</th>
									<th>到等级</th>
									<th>奖励</th>
									<th>金豆要求</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>摇钱树</td>
									<td>1</td>
									<td>3</td>
									<td>100</td>
									<td>
										<a lay-href="<?php echo U('Houtai/gh_edit',array('id'=>$vo['id']));?>"><button class="layui-btn layui-btn-normal layui-btn-sm" style="float: left;"><i class="layui-icon">&#xe642;</i><cite></cite></button></a>
										<button class="layui-btn layui-btn-normal layui-btn-sm" onclick="del_gh(<?php echo ($vo["id"]); ?>)" style="float: left;"><i class="layui-icon">&#xe640;</i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<hr />
				<h2>会员日设置</h2>
				<button class="layui-btn layui-btn-normal" style="display: inline-block;">新建</button>
				<div class="layui-col-md12">
					<div class="layui-card-body" style="height: 300px;overflow-y: scroll;">
						<table class="layui-table" >
							<thead>
								<tr>
									<th>日期</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>1</td>
									<td>10</td>
									<td>
										<a lay-href="<?php echo U('Houtai/gh_edit',array('id'=>$vo['id']));?>"><button class="layui-btn layui-btn-normal layui-btn-sm" style="float: left;"><i class="layui-icon">&#xe642;</i><cite></cite></button></a>
										<button class="layui-btn layui-btn-normal layui-btn-sm" onclick="del_gh(<?php echo ($vo["id"]); ?>)" style="float: left;"><i class="layui-icon">&#xe640;</i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<script src="/game/Public/layuiadmin/layui/layui.js"></script>
		<script src="/game/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/game/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');

			function del_gh(id) {
				if(confirm('确定删除吗?')) {
					$.get('/game/index.php/Home/Huodong/del_gh', {
						id: id
					}, function(data) {
						window.location.reload();
					})
				}
			}
		</script>
	</body>

</html>
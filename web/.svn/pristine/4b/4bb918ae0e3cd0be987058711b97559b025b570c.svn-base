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
				<h2>投诉建议</h2>
				<form class="layui-form" action="">
					<div class="layui-form-item">
						<div class="layui-input-block">
							<input type="radio" name="sex" value="全部" title="全部">
							<input type="radio" name="sex" value="未处理" title="未处理" checked>
							<input type="radio" name="sex" value="已接受" title="已接受">
							<input type="radio" name="sex" value="已拒绝" title="已拒绝" >
							<input type="radio" name="sex" value="待审核" title="待审核">
							<input type="radio" name="sex" value="已审核" title="已审核" >
						</div>
					</div>
				</form>
				<div class="layui-col-md12">
					<div class="layui-card-body" style="height: 300px;overflow-y: scroll;">
						<table class="layui-table">
							<thead>
								<tr>
									<th>游戏账号</th>
									<th>日期</th>
									<th>建议内容</th>
									<th>状态</th>
									<th>奖励</th>
									<th>客服</th>
									<th>处理日期</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
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

		<script src="/Public/layuiadmin/layui/layui.js"></script>
		<script src="/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/Public/layuiadmin/' //静态资源所在路径
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
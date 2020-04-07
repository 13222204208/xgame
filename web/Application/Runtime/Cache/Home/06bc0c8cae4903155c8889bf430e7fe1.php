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
				<div class="layui-col-md12">
					<div class="layui-card-body">
						<table class="layui-table">
							<thead>
								<tr>									
									<th>游戏账号</th>
									<th>用户评级</th>
									<th>玩家总充值</th>
									<th>玩家总捐献</th>
									<th>剩余金币</th>
									<th>流失天数</th>
									<th>手机号</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($con)): foreach($con as $key=>$vo): ?><tr>
										<td><?php echo ($vo["f_username"]); ?></td>
										<td><?php echo ($vo["f_account_id"]); ?></td>
										<td><?php echo ($vo["f_nickname"]); ?></td>
										<td><?php echo ($vo[""]); ?></td>		
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>		
										<td><?php echo ($vo[""]); ?></td>	
										<td>
											<a lay-href="<?php echo U('Houtai/gh_edit',array('id'=>$vo['id']));?>"><button class="layui-btn layui-btn-normal layui-btn-sm" style="float: left;"><i class="layui-icon">&#xe642;</i><cite></cite></button></a>
											<button class="layui-btn layui-btn-normal layui-btn-sm" onclick="del_gh(<?php echo ($vo["id"]); ?>)" style="float: left;"><i class="layui-icon">&#xe640;</i></button>
										</td>
									</tr><?php endforeach; endif; ?>
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
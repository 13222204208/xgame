<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

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
					<div class="layui-card-body">
						<table class="layui-table">
							<colgroup>
								<col width="150">
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
								<tr>
									<th>名称</th>
									<th>账号</th>
									<th>密码</th>
									<th>添加时间</th>
									<th>编辑</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($con)): foreach($con as $key=>$vo): ?><tr>
										<td><?php echo ($vo["mingcheng"]); ?></td>
										<td><?php echo ($vo["zhanghao"]); ?></td>
										<td><?php echo ($vo["mima"]); ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
										<td>
											<a lay-href="<?php echo U('Houtai/dy_edit',array('id'=>$vo['id']));?>"><button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">&#xe642;</i><cite>店员编辑</cite></button></a>
											<button onclick="del_dy(<?php echo ($vo["id"]); ?>)" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">&#xe640;</i></button>
											<!--<a href="/kucun/index.php/Home/Houtai/xiaoshou/id/<?php echo ($vo["id"]); ?>"><button class="layui-btn layui-btn-normal layui-btn-sm">销售详情</button></a>-->
										</td>
									</tr><?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

		<script src="/kucun/Public/layuiadmin/layui/layui.js"></script>
		<script src="/kucun/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/kucun/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');

			function del_dy(id) {
				if(confirm('确定删除吗?')) {
					$.get('/kucun/index.php/Home/Houtai/del_dy', {
						id: id
					}, function(data) {
						window.location.reload();
					})
				}
			}
		</script>
	</body>

</html>
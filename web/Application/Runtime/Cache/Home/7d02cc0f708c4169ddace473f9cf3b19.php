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
				<div class="layui-col-md12">
					<div class="layui-inline">
						<label class="layui-form-label">日期范围</label>
						<div class="layui-input-inline" style="width: 500px;">
							<input type="text" class="layui-input" id="test-laydate-range-date" value="<?php echo ($time); ?>" placeholder=" - " style="display: inline-block;width: 50%;">
							<button class="layui-btn" style="display: inline-block;width: 20%;" onclick="sou('sou')">搜索</button>
							<button class="layui-btn" style="display: inline-block;width: 20%;" onclick="sou('xia')">下载</button>
						</div>
					</div>
					<div class="layui-card-body">
						<table class="layui-table">
							<caption>时间:<?php echo ($time); ?></caption>
							<colgroup>
								<col width="150">
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
								<tr>
									<th>名称</th>
									<th>尺寸</th>
									<th>颜色</th>
									<th>厂家货号</th>
									<th>自己货号</th>
									<th>进价</th>
									<th>售价</th>
									<th>数量</th>
									<th>店员</th>
									<th>添加时间</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($con)): foreach($con as $key=>$vo): ?><tr>
										<td><?php echo ($vo["mingcheng"]); ?></td>
										<td><?php echo ($vo["chicun"]); ?></td>
										<td><?php echo ($vo["yanse"]); ?></td>
										<td><?php echo ($vo["cj_huohao"]); ?></td>
										<td><?php echo ($vo["zj_huohao"]); ?></td>
										<td><?php echo ($vo["danjia"]); ?></td>
										<td><?php echo ($vo["shoujia"]); ?></td>
										<td><?php echo ($vo["num"]); ?></td>
										<td><?php echo ($vo["user"]); ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
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
			}).use(['index', 'laydate'], function() {
				var laydate = layui.laydate;

				//示例代码

				//日期范围
				laydate.render({
					elem: '#test-laydate-range-date',
					range: true
				});

			});

			function sou(val) {
				var time = $('#test-laydate-range-date').val();
				if(val == 'sou') {
					window.location.href = '/kucun/index.php/Home/Houtai/order_list/time/' + time;
				}
				if(val == 'xia') {
					window.location.href = '/kucun/index.php/Home/Houtai/order_list_down/time/' + time;
				}
			}
		</script>
	</body>

</html>
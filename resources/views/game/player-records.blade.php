
<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>layuiAdmin 控制台主页一</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
	</head>

	<body>

		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md12">
					<div>
						<form class="layui-form" action="">
							<div class="layui-inline">
								<label class="layui-form-label">游戏账号</label>
								<div class="layui-input-inline">
									<input type="text" name="zhanghao"  class="layui-input">
						
								</div>
							</div>
							<div class="layui-inline">
								<label class="layui-form-label">用户ID</label>
								<div class="layui-input-inline">
									<input type="text" name="yonghuid" class="layui-input">
						
								</div>
							</div>
							<div class="layui-inline">
								<label class="layui-form-label">日期</label>
								<div class="layui-input-inline">
									<input type="text" name="yue" id="test3" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
						
								</div>
							</div>
							<div class="layui-inline">
								<div class="layui-input-inline">
									<button class="layui-btn" lay-submit lay-filter="formDemo">查询</button>
								</div>
							</div>
						</form>
					</div>
					<div class="layui-card-body">
						<table class="layui-table">
							<thead>
								<tr>									
									<th>游戏ID</th>
									<th>用户账号</th>
									<th>具体游戏</th>
									<th>总压</th>
									<th>总得</th>
									<th>时间</th>
									<th>备注</th>
								</tr>
							</thead>
							<tbody>
															</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

		<script src="/layuiadmin/layui/layui.js"></script>

		<script>
			layui.config({
				base: '/game/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');
			layui.use('laydate', function(){
			  var laydate = layui.laydate;
			  
			  
			  //年月选择器
			  laydate.render({
			    elem: '#test3'
			    ,type: 'month'
			  });
			 })
		
		</script>
	</body>

</html>
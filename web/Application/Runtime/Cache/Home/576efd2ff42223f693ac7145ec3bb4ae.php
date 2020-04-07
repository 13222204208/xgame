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
						<label class="layui-form-label">角色名</label>
						<div class="layui-input-inline">
							<input type="text" name="title" required lay-verify="required" placeholder="请输入角色名" autocomplete="off" class="layui-input">

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
						<!--<table class="layui-table" style="width:2000px;overflow-x: scroll;" lay-filter="demo">
							<thead>
								<tr>
									<th>用户账号</th>
									<th>游戏ID</th>
									<th>角色名</th>
									<th>等级</th>
									<th>手机号</th>
									<th>真实姓名</th>
									<th>金币余额</th>
									<th>钱庄余额</th>
									<th>洗码量余额</th>
									<th>代理号</th>
									<th>总游戏时长</th>
									<th>总充值金额</th>
									<th>总提现金额</th>
									<th>平台总盈亏</th>
									<th>注册时间</th>
									<th>上次登录时间</th>
									<th>上次离线时间</th>
									<th>用户评级</th>
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
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo["f_inserttime"]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td><?php echo ($vo[""]); ?></td>
										<td>
											<a lay-href="<?php echo U('Houtai/gh_edit',array('id'=>$vo['id']));?>"><button class="layui-btn layui-btn-normal layui-btn-sm" style="float: left;"><i class="layui-icon">&#xe642;</i><cite></cite></button></a>
											<button class="layui-btn layui-btn-normal layui-btn-sm" onclick="del_gh(<?php echo ($vo["id"]); ?>)" style="float: left;"><i class="layui-icon">&#xe640;</i></button>
										</td>
									</tr><?php endforeach; endif; ?>
							</tbody>
						</table>-->
						<table id="demo" lay-filter="demo"></table>
					</div>
				</div>

			</div>
		</div>
		<script type="text/html" id="barDemo">

			<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
			<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>

		</script>
		<script type="text/html" id="switchTpl">
		  <!-- 这里的 checked 的状态只是演示 -->
		  <input type="checkbox" name="sex" value="{{d.id}}" lay-skin="switch" lay-text="开|关" lay-filter="sexDemo" {{ d.id == 10003 ? 'checked' : '' }}>
		</script>
		<script type="text/html" id="switchTpl1">
				<select>
						<option value="0">1天</option>
						<option value="1">3天</option>
						<option value="2">7天</option>
						<option value="3">30天</option>
						<option value="4">356天</option>
						<option value="3">永久封禁</option>
						<option value="4">解除封禁</option>
					</select>
		</script>
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
								title: '用户账号',
								width: 150,
								sort: true

							}, {
								field: 'f_account_id',
								width: 150,
								title: '游戏ID'
								
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '角色名',
								
								sort: true
							}, {
								field: 'f_level',
								title: '等级',
								width: 150,
								sort: true
								
							}, {
								field: 'sign',
								width: 150,
								title: '手机号'
								
							}, {
								field: 'experience',
								title: '真实姓名',
								width: 150,
								sort: true
							}, {
								field: 'f_money',
								title: '金币余额',
								width: 135,
								sort: true
							}, {
								field: 'f_savemoney',
								title: '钱庄余额',
								width: 135
							}, {
								field: 'f_xima',
								title: '金豆余额',
								width: 135,
								sort: true
							}
							, {
								field: 'city',
								width: 150,
								title: '所属公会'
								
							}, {
								field: 'f_game_time',
								title: '总游戏时长',
								width: 150,
								sort: true
							}, {
								field: 'experience',
								title: '总充值金额',
								width: 150,
								sort: true
							}, {
								field: 'score',
								title: '公会捐献金额',
								width: 150,
								sort: true
							}, {
								field: 'classify',
								title: '平台总盈亏',
								width: 150,
								sort: true
							}, {
								field: 'f_inserttime',
								title: '注册时间',
								width: 150,
								sort: true
							}, {
								field: 'f_last_login_time',
								title: '上次登录时间',
								width: 150,
								sort: true
							}, {
								field: 'f_last_offline_time',
								title: '上次离线时间',
								width: 150,
								sort: true
							}, {
								field: 'f_inserttime',
								title: '用户评级',
								width: 150,
								sort: true
							}, {
								field: 'id',
								title: '操作',
								width: 135,
								toolbar: '#barDemo',
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
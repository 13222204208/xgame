<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>layuiAdmin 控制台主页一</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
							<label class="layui-form-label">用户账号</label>
							<div class="layui-input-inline">
								<input type="number" name="f_account_id" placeholder="请输入用户账号" autocomplete="off" class="layui-input">

							</div>
						</div>
						<div class="layui-inline">
							<label class="layui-form-label">游戏ID</label>
							<div class="layui-input-inline">
								<input type="number" name="f_role_id" placeholder="请输入游戏ID" autocomplete="off" class="layui-input">

							</div>
						</div>
						<div class="layui-inline">
							<label class="layui-form-label">日期</label>
							<div class="layui-input-inline">
								<input type="text" name="month" id="month" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input">

							</div>
						</div>
						<div class="layui-inline">
							<div class="layui-input-inline">
								<button class="layui-btn" lay-submit lay-filter="formQuery">查询</button>
							</div>
						</div>
					</form>
				</div>
<!-- 				<div class="layui-card-body">
					<table class="layui-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>角色ID</th>
								<th>具体游戏</th>
								<th>押注数量</th>
								<th>赢币数量</th>
								<th>记录生成时间</th>

							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div> -->
			</div>

		</div>
	</div>
	<table id="demo" lay-filter="test"></table>
	<script src="/layuiadmin/layui/layui.js"></script>

	<script>
		layui.config({
			base: '../../../layuiadmin/' //静态资源所在路径
		}).extend({
			index: 'lib/index' //主入口模块
		}).use(['index', 'form', 'laydate','table'], function() {
			var $ = layui.$,
				admin = layui.admin,
				element = layui.element,
				layer = layui.layer,
				laydate = layui.laydate,
				form = layui.form,
				table = layui.table


			//年月选择器
			laydate.render({
				elem: '#month',
				max: 0,
				type: 'month'
			});

			form.on('submit(formQuery)', function(data) {
				console.log(data);
				var f_role_id = data.field.f_role_id;
				var f_account_id = data.field.f_account_id;
				var month = data.field.month;
				tname = month.slice(2);
				tname = tname.replace('-', '');
				if (f_role_id == "") {
					f_role_id = 'not'
				}

				if (f_account_id == "") {
					f_account_id = 'not'
				}
				url ="/query/player/records/"+ f_role_id+'/'+f_account_id+'/'+tname;
				console.log(url);
				//return false;
				table.render({
					elem: '#demo',
					height: 600,
					url: url //数据接口
						,
					page: true //开启分页
						,
					cols: [
						[ //表头
							{
								field: 'f_auto_id',
								title: 'ID',
								width: 120,
								align: 'center',
								sort: true
							},
							{
								field: 'f_role_id',
								title: '游戏ID',
								width: 150,
								align: 'center',
								sort: true
							}, {
								field: 'f_room_type',
								title: '游戏名称',
								width: 240,
								align: 'center',
								templet: function(d) {
								switch (d.f_room_type) {
								case "TWL":
									return "太上老君";
									break;
								case "Ssdt":
									return "神兽单挑";
									break;
								case "Sslz":
									return "三色龙珠";
									break;
								case "FanPai":
									return "王牌小丑";
									break;
								case "all":
									return "所有游戏";
								default:
									return d.f_room_type;
									break;
								}
							},
							}, {
								field: 'f_bet_count',
								title: '压注数量',
								align: 'center',
								width: 180
							}, {
								field: 'f_win_count',
								title: '赢币数量',
								align: 'center',
								width: 180
							}, {
								field: 'f_insert_time',
								title: '记录生成时间',
								align: 'center',
								width: 240
							}
						]

					],
					parseData: function(res) { //res 即为原始返回的数据
						console.log(res);
						return {
							"code": '0', //解析接口状态
							"msg": res.message, //解析提示文本
							"count": res.total, //解析数据长度
							"data": res.data //解析数据列表
						}
					},
					toolbar: '#toolbarDemo',
					title: '后台广告管理',
					totalRow: true

				}); 
				return false;
				/*                 $.ajax({
				                    headers: {
				                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				                    },
				                    url: "{{url('/query/player/records')}}",
				                    type: 'post',
				                    data: {
				                        'f_role_id': f_role_id,
										'f_account_id': f_account_id,
										'tname': tname
				                    },
				                    success: function(res) {
				                        console.log(res);
				                        if (res.status == 200) {
				                            f_role_id = res.f_role_id;
				                            layer.msg("查询成功", {
				                                icon: 1
											});
											


										}else{
											layer.msg("参数不正确", {
				                                icon: 2
				                            });
										} 
									},
									error: function(error) {
										layer.msg("无数据", {
				                                icon: 2
				                            });
				        }
									}); */



			});
		});
	</script>
</body>

</html>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>翻牌大满贯</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
	<link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
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
				<label class="layui-form-label">金豆设置</label>
				<div id="regionData">
				</div>

				<!-- 					<div class="layui-input-block">
						<input type="text" name="jindou_shao" value="11" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="jindou_duo" value="20" class="layui-input" style="width: 50px;display: inline-block;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:
						<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>  -->
			</div>
			<button class="layui-btn" style="margin-left:350px" id="addRegion">添加区间</button>
			<button type="button" class="layui-btn" lay-submit="" lay-filter="updateRegion" style="margin-left:50px">更新</button>
		</form>
		<br /><br />



	</div>

	<script src="/layuiadmin/layui/layui.js"></script>
	<script src="/layuiadmin/layui/jquery3.2.js"></script>




	<script>
		layui.config({
			base: '/layuiadmin/' //静态资源所在路径
		}).extend({
			index: 'lib/index' //主入口模块
		}).use(['index', 'form', 'laydate'], function() {
			var $ = layui.$,
				admin = layui.admin,
				element = layui.element,
				layer = layui.layer,
				laydate = layui.laydate,
				form = layui.form;

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{url('/get/playing/region')}}",
				method: 'get',

				success: function(res) {
					
					$.each(res, function(i, t) {
						$("#regionData").append('<div class="layui-input-block">' +
							'<input type="text" name="f_min_level[]" value="' + t.f_min_level + '" class="layui-input" lay-verify="min_level" style="width: 50px;display: inline-block;"> -- ' +
							'<input type="text" name="f_max_level[]" value="' + t.f_max_level + '" class="layui-input" lay-verify="max_level" style="width: 50px;display: inline-block;">' + ' <span style="white-space:pre;">  ' + '  返利:' +
							'  <input type="text" name="f_proportion[]" value="' + t.f_proportion + '" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比' +
							'<input type="hidden" name="f_id[]"  value="' + t.f_id + '">'+
							'</div> ');
					});

				},

			});


			$("#addRegion").click(function() {//添加区间

				$("#regionData").append('<div class="layui-input-block">' +
					'<input type="text" name="jindou_shao" value="41" class="layui-input" style="width: 50px;display: inline-block;"> -- ' +
					'<input type="text" name="jindou_duo" value="50" class="layui-input" style="width: 50px;display: inline-block;">' + ' <span style="white-space:pre;">  ' + '  返利:  ' +
					'<input type="text" name="fanli" value="20" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比' +
					'</div> ');

					$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('add/playing/region')}}",
					method: 'POST',
					success: function(res) {
						console.log(res);
						if (res == '{"status":200}') {
							layer.msg('添加成功', {
								offset: '15px',
								icon: 1,
								time: 1000
							}, function(){
            location.href= "{{url('/game/playing')}}";
          });
						} else {
							console.log(res);
							layer.msg('添加失败', {
								offset: '15px',
								icon: 2,
								time: 3000
							})
						}
					},
					error: function(error) {
						console.log(error);
						layer.msg('添加失败请重新确认', {
							offset: '15px',
							icon: 2,
							time: 3000
						})
					}
				});
				return false;
			});

			form.verify({
				min_level: function(value) {
					min_level = Number(value)
					
				},
				max_level: function(value) {
					max_level = Number(value);
					
					if (max_level < min_level) {
						return '最大值必须大于最小值';
					}
				}

			});

			form.on('submit(updateRegion)', function(data) {//更新翻牌区间数据
				var data = data.field;
			//	console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('update/playing/region')}}",
					method: 'POST',
					data: data,
					success: function(res) {
						console.log(res);
						if (res == '{"status":200}') {
							layer.msg('添加成功', {
								offset: '15px',
								icon: 1,
								time: 3000
							});
						} else {
							console.log(res);
							layer.msg('添加失败', {
								offset: '15px',
								icon: 2,
								time: 3000
							})
						}
					},
					error: function(error) {
						console.log(error);
						layer.msg('添加失败请重新确认', {
							offset: '15px',
							icon: 2,
							time: 3000
						})
					}
				});
				return false;
			});


		});
	</script>
</body>

</html>
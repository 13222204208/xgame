<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>神兽单挑</title>
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
				<!--  -->


				<!-- 			<div class="layui-input-block">
							<input type="text" name="jindou_shao" value="1" class="layui-input" style="width: 50px;display: inline-block;">--
							<input type="text" name="jindou_duo" value="10" class="layui-input" style="width: 50px;display: inline-block;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
						</div>
	 -->

				<button class="layui-btn" style="margin-left:350px" id="addRegion">添加区间</button>
				<button type="button" lay-submit="" lay-filter="updateRegion"   class="layui-btn" style="margin-left:50px">更新</button>

		</form>
		<br /><br />


		<form class="layui-form" action="" style="width: 60%;">
			<div class="layui-form-item">
				<label class="layui-form-label">赢利点</label>
				<div class="layui-input-block">
					<input type="number" name="int1" value="15" required lay-verify="int1|required" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" class="layui-input" style="width: 400px;display: inline-block;">‰

				</div>
			</div>



			<div class="layui-form-item">
				<label class="layui-form-label">跑马灯总赢分</label>
				<div class="layui-input-block">
					<input type="number" name="int2" value="0" class="layui-input" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="width: 400px;display: inline-block;">

				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">彩金抽取</label>
				<div class="layui-input-block">
					<input type="number" name="int3" value="1" class="layui-input" lay-verify="int3" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="width: 400px;display: inline-block;">%
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label" style="width:100px">奖池最低金额</label>
				<div class="layui-input-block">
					<input type="number" name="int7" value="20000" class="layui-input" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="width: 400px;display: inline-block;">
					
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label" style="width:100px">得彩金概率</label>
				<div class="layui-input-block">
					<input type="number" name="int5" value="1" class="layui-input" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="width: 400px;display: inline-block;">
				
				</div>
			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
				</div>
			</div>
		</form>

	</div>

	<script src="/layuiadmin/layui/layui.js"></script>
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
				url: "{{url('/get/animals/region')}}",
				method: 'get',

				success: function(res) {

					$.each(res, function(i, t) {
						$("#regionData").append('<div class="layui-input-block">' +
							'<input type="text" name="f_min_level[]" value="' + t.f_min_level + '" class="layui-input" lay-verify="min_level" style="width: 50px;display: inline-block;"> -- ' +
							'<input type="text" name="f_max_level[]" value="' + t.f_max_level + '" class="layui-input" lay-verify="max_level" style="width: 50px;display: inline-block;">' + ' <span style="white-space:pre;">  ' + '  返利:' +
							'  <input type="text" name="f_proportion[]" value="' + t.f_proportion + '" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比' +
							'<input type="hidden" name="f_id[]"  value="' + t.f_id + '">' +
							'</div> ');
					});

				},

			});


			$("#addRegion").click(function() { //添加区间

				$("#regionData").append('<div class="layui-input-block">' +
					'<input type="text" name="jindou_shao" value="41" class="layui-input" style="width: 50px;display: inline-block;"> -- ' +
					'<input type="text" name="jindou_duo" value="50" class="layui-input" style="width: 50px;display: inline-block;">' + ' <span style="white-space:pre;">  ' + '  返利:  ' +
					'<input type="text" name="fanli" value="20" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比' +
					'</div> ');

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('add/animals/region')}}",
					method: 'POST',
					success: function(res) {
						console.log(res);
						if (res == '{"status":200}') {
							layer.msg('添加成功', {
								offset: '15px',
								icon: 1,
								time: 1000
							}, function() {
								location.href = "{{url('/game/animals')}}";
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



			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{url('/get/animals/config')}}",
				method: 'get',

				success: function(res) {
					//console.log(res[0].f_int1);
					$(" input[ name='int1' ] ").val(res[0].f_int1);
					$(" input[ name='int2' ] ").val(res[0].f_int2);
					$(" input[ name='int3' ] ").val(res[0].f_int3);
					$(" input[ name='int7' ] ").val(res[0].f_int7);
					$(" input[ name='int5' ] ").val(res[0].f_int5);

				},

			});


			/* 自定义验证规则 */
			form.verify({
				int1: function(value) {
					if (value > 1000) {
						return '赢利点数值不能大于1000';
					}
				},

				int3: function(value) {
					if (value > 100) {
						return '彩金抽取不能大于100';
					}
				},
				
				int5: function(value) {
					if (value > 10000) {
						return '彩金概率不能大于10000';
					}
				},
			});


			form.on('submit(updateRegion)', function(data) {//更新翻牌区间数据
				var data = data.field;
			//	console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('update/animals/region')}}",
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



			/* 监听提交 */
			form.on('submit(component-form-demo1)', function(data) {
				var data = data.field;
				console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('update/animals/config')}}",
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
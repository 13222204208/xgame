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
				<label class="layui-form-label">牌型权重</label>
				<div class="layui-input-block">
					<table class="layui-table" style="width: 60%;">

						<thead>
							<tr>
								<th>牌型</th>
								<th>赔率</th>
								<th>权重</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>五鬼</td>
								<td>1000</td>
								<td><input type="number" name="16" value="20" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>五梅</td>
								<td>250</td>
								<td><input type="number" name="15" value="27" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>同花大顺</td>
								<td>500</td>
								<td><input type="number" name="14" value="40" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>同花小顺</td>
								<td>120</td>
								<td><input type="number" name="13" value="67" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>正宗大四梅</td>
								<td>100</td>
								<td><input type="number" name="12" value="111" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>正宗小四梅</td>
								<td>80</td>
								<td><input type="number" name="11" value="167" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>大四梅</td>
								<td>80</td>
								<td><input type="number" name="10" value="250" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>小四梅</td>
								<td>50</td>
								<td><input type="number" name="9" value="400" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>葫芦</td>
								<td>50</td>
								<td><input type="number" name="8" value="2000" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>同花</td>
								<td>10</td>
								<td><input type="number" name="7" value="2857" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>顺子</td>
								<td>7</td>
								<td><input type="number" name="6" value="4000" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>三条</td>
								<td>5</td>
								<td><input type="number" name="5" value="6667" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>两对</td>
								<td>3</td>
								<td><input type="number" name="4" value="10000" class="layui-input" style="width: 80px;height:24px;display: inline-block;"></td>
							</tr>
						</tbody>
					</table>
					<div class="layui-form-item">
						<div class="layui-input-block">
							<button class="layui-btn"  lay-submit="" lay-filter="updateWeight" >更新牌型权重</button>
							<button type="reset" class="layui-btn layui-btn-primary">重置</button>

						</div>
					</div>
				</div>

			</div>
		</form>

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
				url: "{{url('/get/playing/weight')}}",
				method: 'get',

				success: function(res) {

					console.log(res[4].f_proportion);
					$(" input[ name='4' ] ").val(res[4].f_proportion);
					$(" input[ name='5' ] ").val(res[5].f_proportion);
					$(" input[ name='6' ] ").val(res[6].f_proportion);
					$(" input[ name='7' ] ").val(res[7].f_proportion);
					$(" input[ name='8' ] ").val(res[8].f_proportion);
					$(" input[ name='9' ] ").val(res[9].f_proportion);
					$(" input[ name='10' ] ").val(res[10].f_proportion);
					$(" input[ name='11' ] ").val(res[11].f_proportion);
					$(" input[ name='12' ] ").val(res[12].f_proportion);
					$(" input[ name='13' ] ").val(res[13].f_proportion);
					$(" input[ name='14' ] ").val(res[14].f_proportion);
					$(" input[ name='15' ] ").val(res[15].f_proportion);
					$(" input[ name='16' ] ").val(res[16].f_proportion);

				},

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

			form.on('submit(updateWeight)', function(data) { //更新翻牌权重数据
				var data = data.field;
					console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('update/playing/weight')}}",
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
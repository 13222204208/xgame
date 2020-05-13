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
				<label class="layui-form-label">赢利点</label>
				<div class="layui-input-block">
					<input type="number" name="int1" required lay-verify="int1|required" placeholder="请输入赢利点" autocomplete="off" class="layui-input" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="display: inline-block;width: 60%;">‰
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">波动控制</label>
				<div class="layui-input-block">
					吃分占比<input type="number" name="int3" value="30" class="layui-input" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="width: 80px;display: inline-block;">% 平分占比
					<input type="number" name="int4" value="50" class="layui-input" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" style="width: 80px;display: inline-block;">% 吐分占比
					<input type="number" name="int5" value="20" lay-verify="int5" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" class="layui-input" style="width: 80px;display: inline-block;">%
				</div>
			</div>
	
			<div class="layui-form-item">
				<label class="layui-form-label">连线彩金</label>
				<div class="layui-input-block">
					<input type="number" name="int6" value="1000" lay-verify="int6" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" class="layui-input" style="width: 90px;display: inline-block;">‰有效押注入奖池、奖池最低分数<input type="number" name="int7" value="10000" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" class="layui-input" style="width: 90px;display: inline-block;"> <!-- 彩金中奖概率<input type="text" name="title" value="10000" class="layui-input" style="width: 60px;display: inline-block;">% -->
				</div>
			</div>
			<!-- 	<div class="layui-form-item">
					<label class="layui-form-label">指定放奖</label>
					<div class="layui-input-block">
						账号<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
						座位<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
						牌型<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
					</div>
				</div> -->
			<div class="layui-form-item">
				<label class="layui-form-label">自动踢出</label>
				<div class="layui-input-block">
					<input type="number" name="int8" value="" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" class="layui-input" style="width: 60px;display: inline-block;">分钟未押注自动踢出、连续被踢出
					<!-- <input type="text" name="title" value="" class="layui-input" style="width: 60px;display: inline-block;">次时<input type="text" name="title" value="" class="layui-input" style="width: 60px;display: inline-block;">分钟禁止进入此桌 -->
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">跑马灯条件</label>
				<div class="layui-input-block">
					中奖<input type="number" name="int2" value="" onKeyUp="this.value=this.value.replace(/[^\.\d]/g,'');this.value=this.value.replace('.','');" class="layui-input" style="width: 60px;display: inline-block;">倍以上
				</div>
			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
				url: "{{url('get/game/playing')}}",
				method: 'get',

				success: function(res) {
					//console.log(res[0].f_int1);
					$(" input[ name='int1' ] ").val(res[0].f_int1);
					$(" input[ name='int2' ] ").val(res[0].f_int2);
					$(" input[ name='int3' ] ").val(res[0].f_int3);
					$(" input[ name='int4' ] ").val(res[0].f_int4);
					$(" input[ name='int5' ] ").val(res[0].f_int5);
					$(" input[ name='int6' ] ").val(res[0].f_int6);
					$(" input[ name='int7' ] ").val(res[0].f_int7);
					$(" input[ name='int8' ] ").val(res[0].f_int8);
				},

			});


			/* 自定义验证规则 */
			form.verify({
				int1: function(value) {
					if (value > 1000) {
						return '赢利点数值不能大于1000';
					}
				},
				int5: function(value) {
					var int3 = $('input[name="int3"]').val();
					var int4 = $('input[name="int4"]').val();
					var num = Number(int3) + Number(int4) + Number(value);

					if (num != 100) {
						return '三项数值加在一起必须等于100';
					}
				},
				int6: function(value) {
					if (value > 1000) {
						return '连线彩金数值不能大于1000';
					}
				},
			});



			/* 监听提交 */
			form.on('submit(component-form-demo1)', function(data) {
				var data = data.field;
				console.log(data);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{url('game/playing')}}",
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
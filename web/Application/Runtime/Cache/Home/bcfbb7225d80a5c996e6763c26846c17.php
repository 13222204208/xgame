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
		
		
						<!-- <?php if(is_array($tables)): foreach($tables as $key=>$vo): ?><div class="layui-input-block">
								<input type="text" name="jindou_shao" value="<?php echo ($vo["f_min_level"]); ?>" class="layui-input" style="width: 50px;display: inline-block;">--
								<input type="text" name="jindou_duo" value="<?php echo ($vo["f_max_level"]); ?>" class="layui-input" style="width: 50px;display: inline-block;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="<?php echo ($vo["f_proportion"]); ?>" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
							</div><?php endforeach; endif; ?> -->
		
		
						<div class="layui-input-block">
							<input type="text" name="jindou_shao" value="1" class="layui-input" style="width: 50px;display: inline-block;">--
							<input type="text" name="jindou_duo" value="10" class="layui-input" style="width: 50px;display: inline-block;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
						</div>
						<div class="layui-input-block">
							<input type="text" name="jindou_shao" value="11" class="layui-input" style="width: 50px;display: inline-block;">--
							<input type="text" name="jindou_duo" value="20" class="layui-input" style="width: 50px;display: inline-block;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
						</div>
						<div class="layui-input-block">
							<input type="text" name="jindou_shao" value="21" class="layui-input" style="width: 50px;display: inline-block;">--
							<input type="text" name="jindou_duo" value="30" class="layui-input" style="width: 50px;display: inline-block;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
						</div>
						<div class="layui-input-block">
							<input type="text" name="jindou_shao" value="31" class="layui-input" style="width: 50px;display: inline-block;">--
							<input type="text" name="jindou_duo" value="40" class="layui-input" style="width: 50px;display: inline-block;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="1.3" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
						</div>
						<div class="layui-input-block">
							<input type="text" name="jindou_shao" value="41" class="layui-input" style="width: 50px;display: inline-block;">--
							<input type="text" name="jindou_duo" value="50" class="layui-input" style="width: 50px;display: inline-block;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:<input type="text" name="fanli" value="1.3" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
						</div>
						<button  class="layui-btn" style="margin-left:350px">添加区间</button>
						<button type="button" onclick="tijiao()" class="layui-btn" style="margin-left:50px">提交</button>
		
				
				<br /><br />




				<div class="layui-form-item">
						<label class="layui-form-label">跑马灯</label>
						<div class="layui-input-block">
							庄家牛<input type="text" name="int6" value="<?php echo ($item['f_int6']); ?>" class="layui-input" style="width: 100px;display: inline-block;">
							以上通杀
						</div>
					</div>

					<div class="layui-form-item">
							<label class="layui-form-label">系统庄金币</label>
							<div class="layui-input-block">
								<input type="text" name="int7" value="<?php echo ($item['f_int7']); ?>" class="layui-input" style="width: 500px;display: inline-block;">
								
							</div>
						</div>
	
						<div class="layui-form-item">
								<label class="layui-form-label">玩家抢庄金</label>
								<div class="layui-input-block">
									<input type="text" name="int8" value="<?php echo ($item['f_int8']); ?>" class="layui-input" style="width: 500px;display: inline-block;">
									
								</div>
							</div>


							<div class="layui-form-item">
									<label class="layui-form-label">系统庄限红</label>
									<div class="layui-input-block">
										<input type="text" name="int9" value="<?php echo ($item['f_int9']); ?>" class="layui-input" style="width: 500px;display: inline-block;">
										
									</div>
								</div>

				<div class="layui-form-item">
					<label class="layui-form-label">启动算法</label>
					<div class="layui-input-block">
						<input type="checkbox" name="int2" lay-skin="switch" <?php if($item['f_int2'] == 1 ): ?>checked<?php endif; ?>>
						<input type="text" name="int3" value="<?php echo ($item['f_int3']); ?>" class="layui-input" style="width: 80px;display: inline-block;">%大牌
						<input type="text" name="int4" value="<?php echo ($item['f_int4']); ?>" class="layui-input" style="width: 80px;display: inline-block;">%中牌
						<input type="text" name="int5" value="<?php echo ($item['f_int5']); ?>" class="layui-input" style="width: 80px;display: inline-block;">%小牌
					</div>
				</div>
				
				<div class="layui-form-item">
						<label class="layui-form-label">手续费</label>
						<div class="layui-input-block">
							<input type="text" name="int1" value="<?php echo ($item['f_int1']); ?>" class="layui-input" style="width: 80px;display: inline-block;">%
						</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
							<button class="layui-btn" type="button" onclick="tijiao1()">立即提交</button>
					</div>
				</div>
			</form>

		</div>

		<script src="/game/Public/layuiadmin/layui/layui.js"></script>
		<script src="/game/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/game/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');
			layui.use('form', function() {
				var form = layui.form;

				//监听提交
				form.on('submit(formDemo)', function(data) {
					layer.msg(JSON.stringify(data.field));
					return false;
				});
			});


			function tijiao(){
				jindou_shao_str = '';jindou_duo_str = '';fanli_str = '';
				$("input[name='jindou_shao']").each(function(){					
					jindou_shao_str += $(this).val()+',';
				});
				$("input[name='jindou_duo']").each(function(){
					console.log($(this).val())
					jindou_duo_str += $(this).val()+',';
				});
				$("input[name='fanli']").each(function(){
					console.log($(this).val())
					fanli_str += $(this).val()+',';
				});
				$.post('/game/index.php/Home/Game/add_qujian',{
					// type:'QZ_NN',
					type:"<?php echo ($f_room_type); ?>",
					jindou_shao_str:jindou_shao_str,
					jindou_duo_str:jindou_duo_str,
					fanli_str:fanli_str
				},function(data){
					layer.msg('添加成功')
				})
				console.log(jindou_shao_str)
				console.log(jindou_duo_str)
				console.log(fanli_str)
				//var jindou_shao = $('input[name="jindou_shao[]"]').val();
				
			}

			function tijiao1(){
				var int1 = $('input[name="int1"]').val();
				if($('input[name="int2"]:checked').val() == "on"){
					var int2 = 1  ;
				}
				var int3 = $('input[name="int3"]').val();
				var int4 = $('input[name="int4"]').val();
				var int5 = $('input[name="int5"]').val();
				var int6 = $('input[name="int6"]').val();
				var int7 = $('input[name="int7"]').val();
				var int8 = $('input[name="int8"]').val();
				var int9 = $('input[name="int9"]').val();
				var int10 = $('input[name="int10"]').val();
				$.post('/game/index.php/Home/Game/xiugai',{
					type:"<?php echo ($f_room_type); ?>",
					// type:'QZ_NN',
					int1:int1,
					int2:int2,
					int3:int3,
					int4:int4,
					int5:int5,
					int6:int6,
					int7:int7,
					int8:int8,
					int9:int9,
					int10:int10,
				},function(data){
					layer.msg('成功')
				})
				console.log(int2)
				console.log(int3)
				console.log(int4)
				console.log(int1)
			}




			function del_gh(id) {
				if(confirm('确定删除吗?')) {
					$.get('/game/index.php/Home/Game/del_gh', {
						id: id
					}, function(data) {
						window.location.reload();
					})
				}
			}
		</script>
	</body>

</html>
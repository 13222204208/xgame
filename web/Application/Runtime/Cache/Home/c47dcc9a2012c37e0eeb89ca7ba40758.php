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
					<label class="layui-form-label">赢利点</label>
					<div class="layui-input-block">
						<input type="text" name="int1" required lay-verify="required" placeholder="请输入赢利点" autocomplete="off" class="layui-input" style="display: inline-block;width: 60%;">‰
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">金豆设置</label>
					<div class="layui-input-block">
						<input type="text" name="jindou_shao" value="1" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="jindou_duo" value="10" class="layui-input" style="width: 50px;display: inline-block;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:
						<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="jindou_shao" value="11" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="jindou_duo" value="20" class="layui-input" style="width: 50px;display: inline-block;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:
						<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="jindou_shao" value="21" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="jindou_duo" value="30" class="layui-input" style="width: 50px;display: inline-block;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:
						<input type="text" name="fanli" value="1.2" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="jindou_shao" value="31" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="jindou_duo" value="40" class="layui-input" style="width: 50px;display: inline-block;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:
						<input type="text" name="fanli" value="1.3" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
					<div class="layui-input-block">
						<input type="text" name="jindou_shao" value="41" class="layui-input" style="width: 50px;display: inline-block;">--
						<input type="text" name="jindou_duo" value="50" class="layui-input" style="width: 50px;display: inline-block;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返利:
						<input type="text" name="fanli" value="1.3" class="layui-input" style="width: 50px;display: inline-block;">单位:千分比
					</div>
				</div>
				<button  class="layui-btn" style="margin-left:350px">添加区间</button>
				<button type="button" onclick="tijiao()" class="layui-btn" style="margin-left:50px">提交</button>
				<br /><br />
				<!-- <div class="layui-form-item">
					<label class="layui-form-label">炒场开关</label>
					<div class="layui-input-block">
						<input type="checkbox" name="switch" lay-skin="switch" lay-text="开|关">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">炒场设置</label>
					<div class="layui-input-block">
						当前状态:开启
						<div class="layui-btn-group">
							<button type="button" class="layui-btn">开启</button>
							<button type="button" class="layui-btn layui-btn-danger">关闭</button>
						</div><br /><br /> 有效押注
						<input type="text" name="title" value="200000" class="layui-input" style="width: 80px;display: inline-block;"> 分时结束炒场<br /><br /> 奖池低于
						<input type="text" name="title" value="20000" class="layui-input" style="width: 80px;display: inline-block;"> 分时开始炒场<br /><br /> 炒场时赢利点
						<input type="text" name="title" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" style="display: inline-block;width: 80px;">‰
					</div>
				</div> -->
				<div class="layui-form-item">
					<label class="layui-form-label">波动控制</label>
					<div class="layui-input-block">
						吃分占比<input type="text" name="int3" value="30" class="layui-input" style="width: 80px;display: inline-block;">% 平分占比
						<input type="text" name="int4" value="50" class="layui-input" style="width: 80px;display: inline-block;">% 吐分占比
						<input type="text" name="int5" value="20" class="layui-input" style="width: 80px;display: inline-block;">%
					</div>
				</div>
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
								<td><input type="text" name="title" value="20" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>五梅</td>
								<td>250</td>
								<td><input type="text" name="title" value="80" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>同花大顺</td>
								<td>500</td>
								<td><input type="text" name="title" value="40" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>同花小顺</td>
								<td>120</td>
								<td><input type="text" name="title" value="167" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>正宗大四梅</td>
								<td>100</td>
								<td><input type="text" name="title" value="200" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>正宗小四梅</td>
								<td>80</td>
								<td><input type="text" name="title" value="250" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>大四梅</td>
								<td>80</td>
								<td><input type="text" name="title" value="250" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>小四梅</td>
								<td>50</td>
								<td><input type="text" name="title" value="400" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>葫芦</td>
								<td>50</td>
								<td><input type="text" name="title" value="2000" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>同花</td>
								<td>10</td>
								<td><input type="text" name="title" value="2857" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>顺子</td>
								<td>7</td>
								<td><input type="text" name="title" value="4000" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>三条</td>
								<td>5</td>
								<td><input type="text" name="title" value="6667" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
							<tr>
								<td>两对</td>
								<td>3</td>
								<td><input type="text" name="title" value="10000" class="layui-input" style="width: 60px;height:24px;display: inline-block;"></td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">连线彩金</label>
					<div class="layui-input-block">
						<input type="text" name="int6" value="10000" class="layui-input" style="width: 60px;display: inline-block;">‰有效押注入奖池、奖池最低分数<input type="text" name="int7" value="10000" class="layui-input" style="width: 60px;display: inline-block;">、<!-- 彩金中奖概率<input type="text" name="title" value="10000" class="layui-input" style="width: 60px;display: inline-block;">% -->
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
						<input type="text" name="int8" value="" class="layui-input" style="width: 60px;display: inline-block;">分钟未押注自动踢出、连续被踢出<!-- <input type="text" name="title" value="" class="layui-input" style="width: 60px;display: inline-block;">次时<input type="text" name="title" value="" class="layui-input" style="width: 60px;display: inline-block;">分钟禁止进入此桌 -->
					</div>
				</div>
				<!-- <div class="layui-form-item">
					<label class="layui-form-label">奖池操作</label>
					<div class="layui-input-block">
						<input type="text" name="title" value="初级场" class="layui-input" style="width: 80px;display: inline-block;">场&nbsp;&nbsp;&nbsp;
						<input type="text" name="title" value="03" class="layui-input" style="width: 80px;display: inline-block;">桌&nbsp;&nbsp;&nbsp;
						当前奖池:200000分
						<br /><br />增加<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
						减少<input type="text" name="title" value="" class="layui-input" style="width: 80px;display: inline-block;">
						<button type="button" class="layui-btn">一键清空</button>
					</div>
				</div> -->
				<div class="layui-form-item">
					<label class="layui-form-label">跑马灯条件</label>
					<div class="layui-input-block">
						中奖<input type="text" name="int2" value="" class="layui-input" style="width: 60px;display: inline-block;">倍以上
					</div>
				</div>

				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" type="button" onclick="tijiao1()">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
					//console.log($(this).val())
					jindou_duo_str += $(this).val()+',';
				});
				$("input[name='fanli']").each(function(){
					//console.log($(this).val())
					fanli_str += $(this).val()+',';
				});
				$.post('/game/index.php/Home/Game/add_qujian',{
					 type:'FanPai',
					//type:"<?php echo ($f_room_type); ?>",
					jindou_shao_str:jindou_shao_str,
					jindou_duo_str:jindou_duo_str,
					fanli_str:fanli_str
				},function(data){
					//var type = <?php echo ($f_room_type); ?>;
					
					$.post('/game/jiekou/dynamic_module.php',{type:'FanPai'},function(res){
						//console.log(type)
						console.log(res)
						if(res == ' 成功'){
							layer.msg('成功');
						}else{
							layer.msg('失败');
						}
					})
					//layer.msg('添加成功')
				})
				//console.log(jindou_shao_str)
				//console.log(jindou_duo_str)
				//console.log(fanli_str)
				//var jindou_shao = $('input[name="jindou_shao[]"]').val();
				
			}
			function tijiao1(){
				var int2 = $('input[name="int2"]:checked').val();
				var int3 = $('input[name="int3"]').val();
				var int4 = $('input[name="int4"]').val();
				var int1 = $('input[name="int1"]').val();
				$.post('/game/index.php/Home/Game/xiugai',{
					type:'FanPai',
					//type:"<?php echo ($f_room_type); ?>",
					int2:int2,
					int3:int3,
					int4:int4,
					int1:int1,
					int5:int5,
					int6:int6,
					int7:int7,
					int8:int8
				},function(data){
					//var type = <?php echo ($f_room_type); ?>;
					//console.log(type)
					$.post('/game/jiekou/dynamic_module.php',{type1:'FanPai'},function(res){
						console.log(res)
						if(res == ' 成功'){
							layer.msg('成功');
						}else{
							layer.msg('失败');
						}
					})
					//layer.msg('成功')
				})
				//console.log(int2)
				//console.log(int3)
				//console.log(int4)
				//console.log(int1)
			}
		</script>
	</body>

</html>
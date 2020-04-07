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
					<label class="layui-form-label">类型</label>
					<div class="layui-input-block">
						<input type="radio" lay-filter="MailType" name="MailType" value="0" title="个人邮件" checked="checked">
						<input type="radio" lay-filter="MailType" name="MailType" value="1" title="全服邮件" >
					</div>
				</div>
				<div class="layui-form-item" id="geren">
					<label class="layui-form-label">收件人ID</label>
					<div class="layui-input-block">
						<input type="text" name="RoleID" value="0" class="layui-input" style="width: 350px;display: inline-block;">

					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">邮件标题</label>
					<div class="layui-input-block">
						<input type="text" name="Title" value="1" class="layui-input" style="width: 350px;display: inline-block;">

					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">邮件内容</label>
					<div class="layui-input-block">
						<textarea class="layui-input" name="Content" style="width: 350px;height:100px;display: inline-block;"></textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">发送时间</label>
					<div class="layui-input-block">
						<input type="text" name="StartTime" id="test1" value="<?php echo ($fasong); ?>" class="layui-input" style="width: 350px;display: inline-block;">

					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">销毁时间</label>
					<div class="layui-input-block">
						<input type="text" name="EndTime" id="test2" value="<?php echo ($xiaohui); ?>" class="layui-input" style="width: 350px;display: inline-block;">

					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">重大邮件</label>
					<div class="layui-input-block">
						<input type="radio" name="IsImportant" lay-skin="primary" title="是" value="1" checked="">
						<input type="radio" name="IsImportant" lay-skin="primary" title="否" value="0" checked="checked">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">附件奖励</label>
					<div class="layui-input-block">
						   <input type="radio" name="RewardType" lay-skin="primary" title="金币" value="0" checked="">
						   <input type="radio" name="RewardType" lay-skin="primary" title="金豆" value="1" checked="">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" >数量</label>
					<div class="layui-input-block">
						   <input class="layui-input" name="ReWardCount" value="1" style="width: 150px;height:28px;display: inline-block;" />
					</div>
				</div>
				<!-- <div class="layui-form-item">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						   <label class="layui-form-label" style="padding-left: 0px;width: 40px;">经验</label>
						   <input type="radio" name="" lay-skin="primary" title="数量" checked="">
						   <input class="layui-input" style="width: 150px;height:28px;display: inline-block;" />
					</div>
				</div> -->


				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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
				form.on('radio(MailType)', function(data){
				  console.log(data.elem); //得到radio原始DOM对象
				  console.log(data.value); //被点击的radio的value值
				  if(data.value == '1'){
					  $('#geren').hide();
				  }else{
					  $('#geren').show();
				  }
				});
				//监听提交
				form.on('submit(formDemo)', function(data) {
					//layer.msg(JSON.stringify(data.field));
					var data = JSON.stringify(data.field);
					$.post('/game/jiekou/send_email.php',{data:data},function(res){
						if(res == '成功'){
							layer.msg('成功');
						}else{
							layer.msg('失败');
						}
					})
					return false;
				});
			});
			layui.use('laydate', function(){
			  var laydate = layui.laydate;
			  
			  //常规用法
			  laydate.render({
			    elem: '#test1',
				type: 'datetime'
			  });
			  laydate.render({
			    elem: '#test2',
				type: 'datetime'
			  });
			 }); 

		
		</script>
	</body>

</html>
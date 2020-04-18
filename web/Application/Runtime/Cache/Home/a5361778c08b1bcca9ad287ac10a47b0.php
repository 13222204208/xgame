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
		<div class="layui-col-sm4" style="padding: 30px;">
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">当前在线人数</p>
				<!--	<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="300" style="width: 30%;"><span class="layui-progress-text">30%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">历史最大在线人数</p>
				<!--<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="200" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">跑得快人数</p>
				<!--	<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="100" style="width: 30%;"><span class="layui-progress-text">30%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">抢庄牛牛人数</p>
				<!--<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="300" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">百人牛牛人数</p>
				<!--	<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="300" style="width: 30%;"><span class="layui-progress-text">30%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">摇钱树捕鱼人数</p>
				<!--<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="200" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
				</div>
			</div>

		</div>
		<div class="layui-col-sm4" style="padding: 30px;">
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">牛魔王捕鱼人数</p>
				<!--	<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="300" style="width: 30%;"><span class="layui-progress-text">30%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">翻牌大满贯人数</p>
				<!--<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="200" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">骰宝人数</p>
				<!--	<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="300" style="width: 30%;"><span class="layui-progress-text">30%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">宾果啤酒乐园人数</p>
				<!--<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="200" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
				</div>
			</div>
			<div class="layuiadmin-card-list">
				<p class="layuiadmin-normal-font">西游大满贯人数</p>
				<!--<span>同上期增长</span>-->
				<div class="layui-progress layui-progress-big" lay-showpercent="yes">
					<div class="layui-progress-bar" lay-percent="200" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
				</div>
			</div>
		</div>
		<script src="/game/Public/layuiadmin/layui/layui.js"></script>
		<script src="/game/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/game/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');

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
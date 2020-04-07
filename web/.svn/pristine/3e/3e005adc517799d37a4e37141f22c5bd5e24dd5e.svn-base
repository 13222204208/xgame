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
			<form class="layui-form" action="" >
				<div class="layui-inline">
					<label class="layui-form-label">日期</label>
					<div class="layui-input-inline">
						<input type="text" id="test" name="title" required lay-verify="required" placeholder="请输入用户账号" autocomplete="off" class="layui-input">

					</div>
				</div>
				<div class="layui-inline">
								<label class="layui-form-label">具体游戏</label>
								<div class="layui-inline">
									<select name="city" lay-verify="required">
										<option value=""></option>
										<option value="0">跑得快</option>
										<option value="1">抢庄牛牛</option>
										<option value="2">百人牛牛</option>
										<option value="3">摇钱树捕鱼</option>
										<option value="4">牛魔王捕鱼</option>
										<option value="3">翻牌大满贯</option>
										<option value="4">骰宝</option>
									</select>
								</div>
							</div>
				<div class="layui-inline">
					<div class="layui-input-inline">
						<button class="layui-btn" lay-submit lay-filter="formDemo">查询</button>
					</div>
				</div>
			</form>
			<br />
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">跑得快
				<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;" onclick="xq()">详情</span>
				</div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">抢庄牛牛<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">百人牛牛<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">摇钱树捕鱼<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">牛魔王捕鱼<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">翻牌大满贯<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">骰宝<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">宾果啤酒乐园<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">西游大满贯<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md2">
				<div class="layui-card-header">百家乐<span class="layui-badge layui-bg-red layuiadmin-badge" style="cursor: pointer;">详情</span></div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日盈利 <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="65" style="width: 65;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得 <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="32" style="width: 32;"><span class="layui-progress-text">32</span></div>
					</div>
				</div>
			</div>
			<div class="layui-card layui-col-md11">
				<div class="layui-card-header">数据总览</div>
				<div class="layui-card-body layadmin-takerates">
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日充值<span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="656" style="width: 656;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日捐献<span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="325" style="width: 325;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>玩家金币合计<span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="465" style="width: 465;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>玩家金豆合计<span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="326" style="width: 326;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总压<span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="325" style="width: 325;"><span class="layui-progress-text">32</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>今日总得<span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="465" style="width: 465;"><span class="layui-progress-text">65</span></div>
					</div>
					<div class="layui-progress" lay-showpercent="yes">
						<h3>奖池余额<span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
						<div class="layui-progress-bar" lay-percent="326" style="width: 326;"><span class="layui-progress-text">32</span></div>
					</div>
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
			layui.use('laydate', function() {
				var laydate = layui.laydate;

				//执行一个laydate实例
				laydate.render({
					elem: '#test' //指定元素
						,
					range: true
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
			function xq(){
				layer.open({
				  type: 2, 
				  area: ['800px', '600px'],
				  content: 'xiangqing.html' //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
				});
			}
		</script>
	</body>

</html>
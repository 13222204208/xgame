<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>layuiAdmin 控制台主页一</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="/Public/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/Public/layuiadmin/style/admin.css" media="all">
	</head>

	<body>
		<div style="padding: 20px;">
			<span>自动账单</span>
			<table id="demo" lay-filter="demo"></table>
		</div>
		<div style="padding: 20px;width: 1000px;">
			<span>手动账单</span>
			<table id="demo1" lay-filter="demo1"></table>
			<button class="layui-btn" style="float: right;">添加到账单</button>
		</div>
		<div style="padding: 20px;width: 1000px;padding-bottom: 100px;">
			<span>账单合计</span>
			<table id="demo2" lay-filter="demo2"></table>
			<button class="layui-btn" style="float: right;margin-right: 30%;">提交本次账单</button>
			<button class="layui-btn btn-primary" style="float: right;margin-right: 20%;">查看历史账单</button>
		</div>
	
	
	
		<script src="/Public/layuiadmin/layui/layui.js"></script>
		<script src="/Public/jquery-3.3.1.min.js"></script>
		<script>
			layui.config({
				base: '/Public/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');
				
			layui.use(['table', 'layer'], function() {
				var table = layui.table;
				var layer = layui.layer;
				//第一个实例
				table.render({
					elem: '#demo',
					height: 412,
					title:'自动账单',
					url: '/index.php/Home/Houtai/userlist' //数据接口
						,
						totalRow: true,
					//toolbar: '#toolbarDemo',
					cols: [
						[ //表头
							{
								field: 'f_username',
								title: '账单类型',
								width: 150,
								sort: true,
								totalRowText: '总计'
							}, {
								field: 'f_account_id',
								width: 150,
								title: '金额',
								totalRow: true
								
							}, {
								field: 'f_account_id',
								width: 150,
								title: '收支',
								totalRow: true
								
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '操作人',								
								sort: true
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '时间',								
								sort: true
							}, {
								field: 'f_account_id',
								width: 150,
								title: '备注',
								totalRow: true
								
							}

						]
					]
				});
				//第一个实例
				table.render({
					elem: '#demo1',
					height: 112,
					title:'手动账单',
					url: '/index.php/Home/Houtai/userlist' //数据接口
						,
					cols: [
						[ //表头
							{
								field: 'a',
								title: '账单类型',
								width: 150,
								sort: true,
								edit: 'text'
							}, {
								field: 'b',
								width: 150,
								title: '金额',
								edit: 'text'
								
							}, {
								field: 'c',
								width: 150,
								title: '收支',
								edit: 'text'
								
							}, {
								field: 'd',
								width: 150,
								title: '操作人',								
								edit: 'text'
							}, {
								field: 'e',
								width: 150,
								title: '时间',								
								edit: 'text'
							}, {
								field: 'f',
								width: 150,
								title: '备注',
								edit: 'text'
								
							}
				
						]
					]
				});
				//第一个实例
				table.render({
					elem: '#demo2',
					height: 112,
					title:'自动账单',
					url: '/index.php/Home/Houtai/userlist' //数据接口
					,
					cols: [
						[ //表头
							{
								field: 'a',
								title: '收入总计',
								width: 150,
								sort: true,
								totalRowText: '总计'
							}, {
								field: 'b',
								width: 150,
								title: '支出总计',
								totalRow: true
								
							}, {
								field: 'aa',
								width: 150,
								title: '玩家剩余金币',
								totalRow: true
								
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '玩家剩余金豆',								
								sort: true
							}, {
								field: 'f_nick_name',
								width: 150,
								title: '奖池剩余合计',								
								sort: true
							}, {
								field: 'a',
								width: 150,
								title: '游戏盈利',
								totalRow: true
								
							}
				
						]
					]
				});
				
				

			});


		</script>
	</body>
</html>
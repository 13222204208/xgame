<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>表单元素</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="/kucun/Public/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/kucun/Public/layuiadmin/style/admin.css" media="all">
	</head>

	<body>

		<div class="layui-fluid">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card"  style="min-height: 500px;">
						<form class="layui-form" action="" lay-filter="component-form-element">
							<div class="layui-card-header">请输入库存信息</div>
							<div class="layui-card-body layui-row layui-col-space10">
								<label class="layui-form-label">商品名称：</label>
								<div class="layui-input-block">
                    <input type="text" name="fullname" lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                </div>
								<label class="layui-form-label">商品编号：</label>
								<div class="layui-input-block">
                    <input type="text" name="fullname" lay-verify="required" placeholder="请输入商品编号" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">商品价格：</label>
								<div class="layui-input-block">
                    <input type="text" name="fullname" lay-verify="required" placeholder="请输入商品价格" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">商品数量：</label>
								<div class="layui-input-block">
                    <input type="text" name="fullname" lay-verify="required" placeholder="请输入商品数量" autocomplete="off" class="layui-input">
                </div>
							</div>
					</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
							<button class="layui-btn" lay-submit lay-filter="component-form-element">立即提交</button>
							<button type="reset" class="layui-btn layui-btn-primary">重置</button>
						</div>
					</div>
					</form>

				</div>
			</div>

			<script src="/kucun/Public/layuiadmin/layui/layui.js"></script>

	</body>

</html>
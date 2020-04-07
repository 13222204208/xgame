<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/kucun/Public/mui/mui.css" rel="stylesheet" />

	</head>

	<body>
		<header id="header" class="mui-bar mui-bar-nav" style="background: #3296fa;border-radius: 3px;">
			<a href="/kucun/index.php/Home/Ruku/index"><button class="mui-btn mui-btn-danger">入库</button></a>
			<h1 class="mui-title" style="color: white;">查询(<?php echo session('admin_user');?>)</h1>
			<a href="/kucun/index.php/Home/Ruku/chaxun"><button class="mui-btn mui-btn-danger mui-pull-right">查询</button></a>
		</header>
		<div class="mui-content" style="margin-bottom: 50px;margin-top: 20px;">
			<div class="mui-content-padded" style="margin: 5px;">
				<div class="mui-input-row mui-search" style="display: inline-block;width: 78%;">
					<input type="search" id="huohao" class="mui-input-clear" placeholder="请输入货号" value="<?php echo ($huohao); ?>" style="width: 100%;display: inline-block;">
				</div>
				<button type="button" onclick="search()" class="mui-btn mui-btn-danger" style="width: 20%;display: inline-block;">
					搜索
				</button>
				<div class="mui-input-row mui-search" style="display: inline-block;width: 78%;">
					<input type="search" id="phone" class="mui-input-clear" placeholder="请输入手机号" value="<?php echo ($phone); ?>" style="width: 100%;display: inline-block;">
				</div>
				<button type="button" onclick="search1()" class="mui-btn mui-btn-danger" style="width: 20%;display: inline-block;">
					搜索
				</button>
			</div>

			<div class="mui-card" style="margin-bottom: 35px;margin: 5px;">
				<ul class="mui-table-view">

					<?php if(is_array($con)): foreach($con as $key=>$vo): ?><li class="mui-table-view-cell mui-media" id="a1">
							<img class="mui-media-object mui-pull-left" id="t1" src="/kucun<?php echo ($vo["photo"]); ?>" onclick="dianji()">
							<div class="mui-media-body" style="font-weight: bolder;">
								<p class='mui-ellipsis'>货号:<?php echo ($vo["cj_huohao"]); ?></p>
								<p class='mui-ellipsis'>名称:<?php echo ($vo["mingcheng"]); ?></p>
								<p class='mui-ellipsis'>库存:<?php echo ($vo["num"]); ?> </p>
								<p class='mui-ellipsis'>进价:<?php echo ($vo["danjia"]); ?></p>

							</div>
						</li><?php endforeach; endif; ?>
					<?php if(is_array($con1)): foreach($con1 as $key=>$vo): ?><li class="mui-table-view-cell mui-media">
							<div class="mui-media-body" style="font-weight: bolder;">
								<p class='mui-ellipsis'>名称:<?php echo ($vo["mingcheng"]); ?></p>
								<p class='mui-ellipsis'>尺寸:<?php echo ($vo["chicun"]); ?> </p>
								<p class='mui-ellipsis'>颜色:<?php echo ($vo["yanse"]); ?></p>
								<p class='mui-ellipsis'>售价:<?php echo ($vo["shoujia"]); ?></p>
								<p class='mui-ellipsis'>数量:<?php echo ($vo["num"]); ?></p>
								<p class='mui-ellipsis'>下单时间:<?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></p>
							</div>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>

		</div>

		</form>

		<script src="/kucun/Public/mui/mui.min.js"></script>
		<script src="/kucun/Public/jquery-3.3.1.min.js"></script>

	</body>
	<script type="text/javascript">
		mui.init();

		function search() {
			var huohao = $('#huohao').val();
			window.location.href = '/kucun/index.php/Home/Ruku/chaxun/huohao/' + huohao;
		}

		function search1() {
			var phone = $('#phone').val();
			window.location.href = '/kucun/index.php/Home/Ruku/chaxun/phone/' + phone;
		}
	</script>

</html>
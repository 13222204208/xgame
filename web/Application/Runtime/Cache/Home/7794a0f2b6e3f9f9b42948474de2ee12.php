<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/kucun/Public/mui/mui.css" rel="stylesheet" />
		<style>
			.liebiao {
				padding-top: 20px;
				width: 20px;
				background-color: lightgrey;
				position: absolute;
				height: 100%;
				z-index: 10;
				left: 0px;
				min-height: 1200px;
			}
			
			.but {
				width: 20px;
				text-align: center;
				padding: 0px;
				margin-top: 10px;
			}
			
			input::-webkit-input-placeholder {
				text-align: center;
			}
		</style>
	</head>

	<body>
		<div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable">
			<header id="header" class="mui-bar mui-bar-nav" style="background: #f7f7f7;border-radius: 3px; box-shadow: 0 1px 6px #ccc">
				<a href="javascript :history.back(-1)" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
				<h1 class="mui-title">销  售(<?php echo session('dy_user');?>)</h1>
				<a href="" id="offCanvasShow" class="mui-icon mui-icon-bars mui-pull-right"></a>
			</header>

			<aside id="offCanvasSide" class="mui-off-canvas-left">
				<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<div class="title">侧滑导航</div>
						<div class="content">
							<p style="margin: 10px 15px;margin-top: 30px;">
								<button id="offCanvasHide" type="button" class="mui-btn mui-btn-danger mui-btn-block" style="padding: 5px 20px;">关闭侧滑菜单</button>
								<button onclick="logout('xiao')" type="button" class="mui-btn mui-btn-danger mui-btn-block" style="padding: 5px 20px;margin-top: 30px;">销售详情</button>
								<button onclick="logout('ku')" type="button" class="mui-btn mui-btn-danger mui-btn-block" style="padding: 5px 20px;">库存查询</button>

								<button onclick="logout('tui')" type="button" class="mui-btn mui-btn-danger mui-btn-block" style="padding: 5px 20px;margin-top: 400px;">退出登录</button>
							</p>

						</div>

					</div>
				</div>
			</aside>

			<div class="mui-inner-wrap" style="margin-bottom: 50px;min-height: 800px;overflow: scroll;">
				<div class="mui-content">
					<div class="mui-input-row mui-radio mui-hidden" id="move-togger" style="display: none;">
						<input name="style" type="radio" value="all-move">
					</div>
					<div class="mui-content-padded" style="padding-top: 64px;min-height: 800px;overflow: scroll;">
						<div class="mui-input-row mui-search" style="display: inline-block;width: 78%;">
							<input type="search" id="huohao" class="mui-input-clear" placeholder="请输入货号" value="<?php echo ($huohao); ?>" style="width: 100%;display: inline-block;">
						</div>
						<button type="button" onclick="search()" class="mui-btn mui-btn-danger" style="width: 20%;display: inline-block;">
						搜索
					</button>
					
					<div class="mui-card" style="margin-bottom: 35px;margin: 5px;">
						<ul class="mui-table-view">

							<?php if(is_array($con)): foreach($con as $key=>$vo): ?><li class="mui-table-view-cell mui-media" id="a1">
									<img class="mui-media-object mui-pull-left" id="t1" src="/kucun<?php echo ($vo["photo"]); ?>" onclick="dianji()">
									<div class="mui-media-body" style="font-weight: bolder;">
										<p class='mui-ellipsis'>自己货号:<?php echo ($vo["zj_huohao"]); ?></p>
										<p class='mui-ellipsis'>厂家货号:<?php echo ($vo["cj_huohao"]); ?></p>
										<p class='mui-ellipsis'>名称:<?php echo ($vo["mingcheng"]); ?></p>
										<p class='mui-ellipsis'>库存:<?php echo ($vo["num"]); ?> </p>

									</div>
								</li><?php endforeach; endif; ?>

						</ul>
					</div>
					</div>

					
				</div>
			</div>
		</div>

		<script src="/kucun/Public/mui/mui.min.js"></script>
		<script src="/kucun/Public/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
			function logout(val) {
				if(val == 'xiao') {
					alert('暂未开放');
				}
				if(val == 'ku') {
					window.location.href = '/kucun/index.php/Home/Dianyuan/kucun';
				}
				if(val == 'tui') {
					window.location.href = '/kucun/index.php/Home/login';
				}

			}

			function search() {
				var huohao = $('#huohao').val();
				window.location.href = '/kucun/index.php/Home/Dianyuan/kucun/huohao/' + huohao;
			}
		</script>
		<script>
			mui.init();
			//侧滑容器父节点
			var offCanvasWrapper = mui('#offCanvasWrapper');
			//主界面容器
			var offCanvasInner = offCanvasWrapper[0].querySelector('.mui-inner-wrap');
			//菜单容器
			var offCanvasSide = document.getElementById("offCanvasSide");
			if(!mui.os.android) {
				document.getElementById("move-togger").classList.remove('mui-hidden');
				var spans = document.querySelectorAll('.android-only');
				for(var i = 0, len = spans.length; i < len; i++) {
					spans[i].style.display = "none";
				}
			}
			//移动效果是否为整体移动
			var moveTogether = false;
			//侧滑容器的class列表，增加.mui-slide-in即可实现菜单移动、主界面不动的效果；
			var classList = offCanvasWrapper[0].classList;
			//变换侧滑动画移动效果；
			mui('.mui-input-group').on('change', 'input', function() {
				if(this.checked) {
					offCanvasSide.classList.remove('mui-transitioning');
					offCanvasSide.setAttribute('style', '');
					classList.remove('mui-slide-in');
					classList.remove('mui-scalable');
					switch(this.value) {
						case 'main-move':
							if(moveTogether) {
								//仅主内容滑动时，侧滑菜单在off-canvas-wrap内，和主界面并列
								offCanvasWrapper[0].insertBefore(offCanvasSide, offCanvasWrapper[0].firstElementChild);
							}
							break;
						case 'main-move-scalable':
							if(moveTogether) {
								//仅主内容滑动时，侧滑菜单在off-canvas-wrap内，和主界面并列
								offCanvasWrapper[0].insertBefore(offCanvasSide, offCanvasWrapper[0].firstElementChild);
							}
							classList.add('mui-scalable');
							break;
						case 'menu-move':
							classList.add('mui-slide-in');
							break;
						case 'all-move':
							moveTogether = true;
							//整体滑动时，侧滑菜单在inner-wrap内
							offCanvasInner.insertBefore(offCanvasSide, offCanvasInner.firstElementChild);
							break;
					}
					offCanvasWrapper.offCanvas().refresh();
				}
			});
			//主界面‘显示侧滑菜单’按钮的点击事件
			document.getElementById('offCanvasShow').addEventListener('tap', function() {
				offCanvasWrapper.offCanvas('show');
			});
			//菜单界面，‘关闭侧滑菜单’按钮的点击事件
			document.getElementById('offCanvasHide').addEventListener('tap', function() {
				offCanvasWrapper.offCanvas('close');
			});
			//主界面和侧滑菜单界面均支持区域滚动；
			mui('#offCanvasSideScroll').scroll();
			mui('#offCanvasContentScroll').scroll();
			//实现ios平台原生侧滑关闭页面；
			if(mui.os.plus && mui.os.ios) {
				mui.plusReady(function() { //5+ iOS暂时无法屏蔽popGesture时传递touch事件，故该demo直接屏蔽popGesture功能
					plus.webview.currentWebview().setStyle({
						'popGesture': 'none'
					});
				});
			}
		</script>

	</body>

</html>
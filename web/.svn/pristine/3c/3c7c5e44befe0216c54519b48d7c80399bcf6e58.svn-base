<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/kucun/Public/mui/mui.css" rel="stylesheet" />
		<style>
			.liebiao {
				width: 20px;
				background-color: #f2f2f2;
				position: absolute;
				display: inline-block;
				height: 100%;
				z-index: 10;
				left: 0px;
				min-height: 1200px;
				border-radius: 3px;
			}
			
			.but {
				width: 20px;
				text-align: center;
				padding: 0px;
				margin-top: 5px;
			}
			
			input::-webkit-input-placeholder {
				text-align: center;
			}
			
			.guding {
				position: fixed;
				z-index: 999;
				background: #f2f2f2;
				width: 100%;
			}
		</style>
	</head>

	<body>
		<div id="offCanvasWrapper" class="mui-off-canvas-wrap">
			<header id="header" class="mui-bar mui-bar-nav" style="background: #f7f7f7;border-radius: 3px; box-shadow: 0 1px 6px #ccc">
				<h1 class="mui-title">销  售(<?php echo session('dy_user');?>)</h1>
				<a id="offCanvasShow" class="mui-icon mui-icon-bars mui-pull-right"></a>
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

								<button onclick="logout('tui')" type="button" class="mui-btn mui-btn-danger mui-btn-block" style="padding: 5px 20px;margin-top: 300px;">退出登录</button>
							</p>

						</div>

					</div>
				</div>
			</aside>

			<div class="mui-inner-wrap" style="margin-bottom: 50px;min-height: 800px;height: 800px;overflow: scroll;">
				<div class="mui-scroll">
					<div class="mui-content">
						<div class="guding">
							<div class="mui-content-padded" style="margin: 5px;margin-top: 44px;">
								<div class="mui-input-row mui-search">
									<input type="search" name="phone" class="mui-input-clear" value="<?php echo ($phone); ?>" placeholder="请输入手机号" oninput="cishu()">
								</div>
							</div>
							<ul class="mui-table-view mui-grid-view mui-grid-9">
								<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
									<a href="#">
										<span class="h2"><h2 id="cishu">0</h2></span>
										<div class="mui-media-body">购买次数</div>
									</a>
								</li>
								<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
									<a href="#">
										<span class="h2"><h2 id="zongjin">0</h2></span>
										<div class="mui-media-body">总金额</div>
									</a>
								</li>
								<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
									<a href="#">
										<span class="h2"><h2 id="zongshu">0</h2></span>
										<div class="mui-media-body">总数量</div>
									</a>
								</li>
							</ul>

							<button type="button" onclick="queding()" class="mui-btn mui-btn-primary" style="width: 40%;margin: 0px 5%;">
					确定
				</button>

							<button type="button" onclick="dayin()" class="mui-btn mui-btn-danger" style="width: 40%;">
					打印
				</button>
							<hr />
						</div>

						<div class="" style="padding-bottom: 18 5px;min-height: 800px;height: 800px;overflow: scroll;padding-top: 250px;">

							<ul class="mui-table-view" style="padding-left: 10px;">

								<?php if(is_array($con)): foreach($con as $key=>$vo): ?><li class="mui-table-view-cell" id="a<?php echo ($vo["id"]); ?>">
										<img class="mui-media-object mui-pull-left" id="t1" src="/kucun<?php echo ($vo["photo"]); ?>" onclick="dianji()">
										<div class="mui-media-body">
											<p class='mui-ellipsis'>名称:<?php echo ($vo["mingcheng"]); ?></p>
											<p class='mui-ellipsis'>尺寸:<?php echo ($vo["chicun"]); ?> 颜色:<?php echo ($vo["yanse"]); ?> </p>
											<div style="display: flex;align-items: center;">
												<input id="danjia<?php echo ($vo["id"]); ?>" class="mui-input-numbox" value="<?php echo ($vo["shoujia"]); ?>" type="number" placeholder="单价" disabled="disabled"  style="width: 68px;height: 35px;margin-bottom: 0px;text-align: center;" placeholder="" />
												<div class="mui-numbox" data-numbox-min='1' data-numbox-max='999'>
													<!--<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>-->
													<input id="num<?php echo ($vo["id"]); ?>" class="mui-input-numbox" type="number" value="<?php echo ($vo["num"]); ?>" disabled="disabled" />
													<!--<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>-->
												</div>
											</div>
											<hr />
											<span style="display: inline-block;height: 30px;line-height: 30px;margin-top: 5px;">&nbsp;&nbsp;&nbsp;货号: <?php echo ($vo["zj_huohao"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小计:<span id="xiaoji<?php echo ($vo["id"]); ?>"><?php echo ($vo["heji"]); ?></span></span>

											<div class="mui-input-row mui-checkbox" style="z-index: 9;float: right;margin-bottom: 3px;">
												<!--<input name="checkbox" onclick="zong()" value="<?php echo ($vo["id"]); ?>" type="checkbox" checked="checked" style="z-index: 9;">-->
												<button onclick="del(<?php echo ($vo["id"]); ?>)">删除</button>
											</div>
											<div class="mui-input-row mui-radio mui-hidden" id="move-togger" style="display: none;">
									<input name="style" type="radio" value="main-move">
								</div>
										</div>
									</li><?php endforeach; endif; ?>

							</ul>
						</div>
						<button type="button" onclick="qingkong()"  class="mui-btn mui-btn-primary" style="position: fixed;bottom: 0px;width: 50%;">点击清空</button>
						<button type="button" onclick="jixu()"  class="mui-btn mui-btn-danger" style="position: fixed;bottom: 0px;width: 50%;right:0px;">继续添加</button>
					</div>
				</div>
			</div>
		</div>
		<script src="/kucun/Public/mui/mui.min.js"></script>
		<script src="/kucun/Public/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
			function cishu() {
				var phone = $('input[name="phone"]').val();
				$.get('/kucun/index.php/Home/Dianyuan/cishu', {
					phone: phone
				}, function(data) {
					$('#cishu').html(data.cishu);
					$('.liang').html(data.liang);
					$('#zongshu').html(data.zongshu);
					$('#zongjin').html(data.zongjin);
				})
			}
			cishu();
			
			function qingkong(){
				$.get('/kucun/index.php/Home/Dianyuan/qingkong',{},function(data){
					alert('已清空');
					window.location.href='/kucun/index.php/Home/Dianyuan/index';
				})
			}
			function jixu(){
				window.location.href='/kucun/index.php/Home/Dianyuan/index';
			}
			function search() {
				var huohao = $('#huohao').val();
				var phone = $('input[name="phone"]').val();
				if(phone == '') {
					phone = 1;
				}

				//$('html,body').animate({scrollTop:$('#a'+huohao).offset().top}, 800);

				window.location.href = '/kucun/index.php/Home/Dianyuan/index#a' + huohao;
			}

			function tiao(id) {
				window.location.href = '/kucun/index.php/Home/Dianyuan/index#a' + id;
			}

			function xiao(id) {
				var danjia = $('#danjia' + id).val();
				var num = $('#num' + id).val();
				var xiaoji = accMul(danjia, num);
				console.log(parseFloat(danjia));
				console.log(parseInt(num));
				$('#xiaoji' + id).html(xiaoji);

				zong();
			}

			function accMul(arg1, arg2) {
				var m = 0,
					s1 = arg1.toString(),
					s2 = arg2.toString();
				try {
					m += s1.split(".")[1].length
				} catch(e) {}
				try {
					m += s2.split(".")[1].length
				} catch(e) {}
				return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
			}

			function zong() {
				z_num = 0;
				z_jia = 0;
				$("input:checkbox[name='checkbox']:checked").each(function() {
					//操作
					var id = $(this).val();
					var danjia = $('#danjia' + id).val();
					var num = $('#num' + id).val();
					var xiaoji = accMul(danjia, num);
					z_num += parseInt(num);
					z_jia += xiaoji;

				});
				localStorage.setItem('z_num', z_num);
				localStorage.setItem('z_jia', z_jia);

				var a = localStorage.getItem('z_num');
				var b = localStorage.getItem('z_jia');

				$('#zongjin').html(b);
				$('#zongshu').html(a);

				id_str = '';
				danjia_str = '';
				num_str = '';
				$("input:checkbox[name='checkbox']:checked").each(function() {
					//操作
					var id = $(this).val();
					var danjia = $('#danjia' + id).val();
					var num = $('#num' + id).val();
					id_str += id + ',';
					danjia_str += danjia + ',';
					num_str += num + ',';
				});

			}
			zong();

			function accAdd(arg1, arg2) {
				var r1, r2, m;
				try {
					r1 = arg1.toString().split(".")[1].length
				} catch(e) {
					r1 = 0
				}
				try {
					r2 = arg2.toString().split(".")[1].length
				} catch(e) {
					r2 = 0
				}
				m = Math.pow(10, Math.max(r1, r2))
				return(arg1 * m + arg2 * m) / m
			}

			function queding() {
				if(confirm('确定提交吗?')) {
					var phone = $('input[name="phone"]').val();
					var zongjin = $('#zongjin').text();
					var zongshu = $('#zongshu').text();
					id_str = '';
					danjia_str = '';
					num_str = '';
					$("input:checkbox[name='checkbox']:checked").each(function() {
						//操作
						var id = $(this).val();
						var danjia = $('#danjia' + id).val();
						var num = $('#num' + id).val();
						id_str += id + ',';
						danjia_str += danjia + ',';
						num_str += num + ',';
					});
					if(id_str == '') {
						alert('请选择商品');
					} else {
						$.get('/kucun/index.php/Home/Dianyuan/queding', {
							id_str: id_str,
							danjia_str: danjia_str,
							num_str: num_str,
							phone: phone,
							zongjin: zongjin,
							zongshu: zongshu
						}, function(data) {
							alert('下单成功');
							//console.log(data);
							window.location.href = '/kucun/index.php/Home/Dianyuan/index';
						})
					}

				} else {

				}
			}

			function dayin() {
				if(confirm('确定打印吗?')) {
					var phone = $('input[name="phone"]').val();
					var zongjin = $('#zongjin').text();
					var zongshu = $('#zongshu').text();
					id_str = '';
					danjia_str = '';
					num_str = '';
					$("input:checkbox[name='checkbox']:checked").each(function() {
						//操作
						var id = $(this).val();
						var danjia = $('#danjia' + id).val();
						var num = $('#num' + id).val();
						id_str += id + ',';
						danjia_str += danjia + ',';
						num_str += num + ',';
					});
					if(id_str == '') {
						alert('请选择商品');
					} else {
						$.get('/kucun/index.php/Home/Dianyuan/queding', {
							id_str: id_str,
							danjia_str: danjia_str,
							num_str: num_str,
							phone: phone,
							zongjin: zongjin,
							zongshu: zongshu
						}, function(data) {})
						$.get('/kucun/index.php/Home/Dianyuan/dayin', {
							id_str: id_str,
							danjia_str: danjia_str,
							num_str: num_str,
							phone: phone,
							zongjin: zongjin,
							zongshu: zongshu
						}, function(data) {
							alert('打印成功');
						})
					}
				} else {

				}
			}

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
			function del(id){
				$.get('/kucun/index.php/Home/Dianyuan/del',{id:id},function(data){
					alert('已删除');
					window.location.reload();
				})
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
			//mui('#offCanvasSideScroll').scroll();
			//mui('#offCanvasContentScroll').scroll();
			//实现ios平台原生侧滑关闭页面；
			if(mui.os.plus && mui.os.ios) {
				mui.plusReady(function() { //5+ iOS暂时无法屏蔽popGesture时传递touch事件，故该demo直接屏蔽popGesture功能
					plus.webview.currentWebview().setStyle({
						'popGesture': 'none'
					});
				});
			}
		</script>
		<script>
			(function($) {
				$(".mui-scroll-wrapper").scroll({
					bounce: false, //滚动条是否有弹力默认是true
					indicators: false, //是否显示滚动条,默认是true
				});

			})(mui);
		</script>

	</body>

</html>
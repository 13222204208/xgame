<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/kucun/Public/mui/mui.css" rel="stylesheet" />
		<style>
			input{
				padding-left: 10px;
			}
		</style>
	</head>

	<body>
		<header id="header" class="mui-bar mui-bar-nav" style="background: #3296fa;border-radius: 3px;">
			<a href="/kucun/index.php/Home/Ruku/index"><button class="mui-btn mui-btn-danger">入库</button></a>
			<h1 class="mui-title" style="color: white;">入库(<?php echo session('admin_user');?>)</h1>
			<a href="/kucun/index.php/Home/Ruku/chaxun"><button class="mui-btn mui-btn-danger mui-pull-right">查询</button></a>
		</header>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="mui-content" style="margin-bottom: 50px;margin-top: 50px;padding: 0px 10px;">
				<select name="gonghuoshang">
					<option>请选择供货商</option>
					<?php if(is_array($gh)): foreach($gh as $key=>$vo): ?><option value="<?php echo ($vo["mingcheng"]); ?>"><?php echo ($vo["mingcheng"]); ?></option><?php endforeach; endif; ?>

				</select>
				<div class="mui-input-row mui-password">
					<div class="div1">

						<input type="file" name="photo" class="file_input">
					</div>
				</div><br />
				<div class="mui-input-row">
					厂家编码:<input type="text" style="width: 70%;" name="cj_huohao" placeholder="请输入厂家编码" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					名称:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="mingcheng" placeholder="请输入名称" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					自己货号:<input type="text" style="width: 70%;" name="zj_huohao" onblur="zidong(this.value)" placeholder="请输入自己货号" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					尺寸:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="chicun" placeholder="请输入尺寸" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					颜色:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="yanse" placeholder="请输入颜色" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					批发价:&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="pifa" placeholder="请输入批发价" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					零售价:&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="lingshou" placeholder="请输入零售价" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					数量:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="num" placeholder="请输入数量" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					单价:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="danjia" placeholder="请输入单价" class="mui-input-password">
				</div>
				<div class="mui-input-row mui-password">
					合计:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width: 70%;" name="heji" onclick="tongji();" placeholder="合计" class="mui-input-password">
				</div>

			</div>

			<nav class="mui-bar mui-bar-tab">

				<button class="mui-btn mui-btn-danger" style="width: 80%;margin-left: 10%;">
					确定
				</button>

			</nav>
		</form>

		<script src="/kucun/Public/mui/mui.min.js"></script>
		<script src="/kucun/Public/jquery-3.3.1.min.js"></script>

	</body>
	<script type="text/javascript">
		mui.init();
  	$(function(){
            $('input[name="zj_huohao"]').click(function() {
                this.focus();
                //$('#'+this.id +'msg').show();
            });
            $('input[name="zj_huohao"]').blur(function() {
               // $('#'+this.id +'msg').hide();
            });
        });
		function tongji() {
			var num = $('input[name="num"]').val();
			var danjia = $('input[name="danjia"]').val();
			var heji = num * danjia;
			$('input[name="heji"]').val(heji);
		}

		function zidong(val) {
			$.get('/kucun/index.php/Home/Ruku/zidong', {
				val:val
			}, function(data) {

				if(data.length !== 0) {
					$('input[name="cj_huohao"]').val(data[0]['cj_huohao']);
					$('input[name="mingcheng"]').val(data[0]['mingcheng']);
					$('input[name="chicun"]').val(data[0]['chicun']);
					$('input[name="yanse"]').val(data[0]['yanse']);
					$('input[name="pifa"]').val(data[0]['pifa']);
					$('input[name="lingshou"]').val(data[0]['lingshou']);
				}

			})
		}
	</script>

</html>
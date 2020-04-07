<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 控制台主页一</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/kucun/Public/layuiadmin/style/admin.css" media="all">
</head>
<body>
  
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md8">
      	<form class="layui-form" action="" method="post" >
          <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-block">
              <input type="text" style="width: 400px;display: inline-block;" name="phone" value="<?php echo ($phone); ?>" lay-verify="phone" autocomplete="off" placeholder="请输入手机号" class="layui-input">
           		  <button class="layui-btn" style="width: 100px;margin-left: 20px;display: inline-block;">查询</button>
            </div>
          
          </div>
        </form>
        <div class="layui-card-body">
            <table class="layui-table">
              <colgroup>
                <col width="150">
                <col width="150">
                <col width="200">
                <col>
              </colgroup>
              <thead>
                <tr>
                  <th>货号</th>
                  <th>名称</th>
                  <th>单价</th>
                  <th>数量</th>
                  <th>合计</th>
                </tr> 
              </thead>
              <tbody>
              	<?php if(is_array($con)): foreach($con as $key=>$vo): ?><tr>
                  <td><?php echo ($vo["cj_huohao"]); ?></td>
                  <td><?php echo ($vo["mingcheng"]); ?></td>
                  <td><?php echo ($vo["shoujia"]); ?></td>
                   <td><?php echo ($vo["num"]); ?></td>
                  <td><?php echo ($vo["heji"]); ?></td>
                
                </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
      </div>
      
      
    </div>
  </div>

  <script src="/kucun/Public/layuiadmin/layui/layui.js"></script>  
</body>
</html>
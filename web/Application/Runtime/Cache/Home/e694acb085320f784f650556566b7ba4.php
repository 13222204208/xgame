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
      <div class="layui-col-md12">
        <div class="layui-card-body">
            <table class="layui-table " style="table-layout: fixed;">            
              <thead>
                <tr>
                	<th style="width: 50px;">图片</th>
                  <th style="width: 150px;">名称</th>
                  <th>尺寸</th>
                  <th style="width: 100px;">颜色</th>
                  <th>厂家货号</th>
                  <th>自己货号</th>
                  <th>单价</th>
                  <th>批发价</th>
                  <th>零售价</th>
                  <th>数量</th>
                  <th>供货商</th>
                  <th>添加时间</th>
									 <th>操作</th>
                </tr> 
              </thead>
              <tbody>
              	<?php if(is_array($con)): foreach($con as $key=>$vo): ?><tr>
                	<td style="width: 50px;"><img class="mui-media-object mui-pull-left"  src="/kucun<?php echo ($vo["photo"]); ?>" style="height: 40px;"></td>
                  <td><?php echo ($vo["mingcheng"]); ?></td>
                  <td><?php echo ($vo["chicun"]); ?></td>
                  <td style="width: 100px;"><?php echo ($vo["yanse"]); ?></td>
                   <td><?php echo ($vo["cj_huohao"]); ?></td>
                  <td><?php echo ($vo["zj_huohao"]); ?></td>
                  <td><?php echo ($vo["danjia"]); ?></td>
                  <td><?php echo ($vo["pifa"]); ?></td>
                  <td><?php echo ($vo["lingshou"]); ?></td>
                   <td><?php echo ($vo["num"]); ?></td>
                  <td><?php echo ($vo["gonghuoshang"]); ?></td>
                  <td style="width: 30px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
                   <td style="display: flex;justify-content: space-between;">
                   	<a lay-href="<?php echo U('Houtai/goods_edit',array('id'=>$vo['id']));?>"><button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">&#xe642;</i><cite>编辑</cite></button></a>
             				<a><button class="layui-btn layui-btn-danger layui-btn-sm"  onclick="del(<?php echo ($vo["id"]); ?>)"><i class="layui-icon">&#xe640;</i><!--<cite>删除</cite>--></button></a>
                   </td>
                </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
      </div>
      
      
    </div>
  </div>

  <script src="/kucun/Public/layuiadmin/layui/layui.js"></script>  
  <script src="/kucun/Public/jquery-3.3.1.min.js"></script>
  <script>
  layui.config({
    base: '/kucun/Public/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use('index');
  
  function del(id){
  	if(confirm('确定删除吗?')){
  		$.get('/kucun/index.php/Home/Houtai/goods_del',{id:id},function(data){
  			window.location.reload();
  		})
  	}
  }
  </script>
</body>
</html>
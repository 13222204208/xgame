<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>排行榜活动</title>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>
<body>
<!-- <form class="layui-form" action="">
<br>
  <div class="layui-form-item">
      <label class="layui-form-label">选择公会</label>
      <div class="layui-input-block">
        <select name="city" lay-verify="required">
          <option value=""></option>
          <option value="0">北京</option>
          <option value="1">上海</option>
          <option value="2">广州</option>
          <option value="3">深圳</option>
          <option value="4">杭州</option>
        </select>
      </div>
    </div>
 
</form> -->
<table id="demo" lay-filter="test"></table>

<script type="text/html" id="delete">

  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">请离成员</a>

</script>

 <script src="/layuiadmin/layui/layui.js"></script>
 <script>
 layui.use('table', function(){
   var table = layui.table;
   
   //第一个实例
   table.render({
     elem: '#demo'
     ,height: 312
     ,url: "{{url('/the-charts/info')}}" //数据接口
     ,page: true //开启分页
     ,cols: [[ //表头
       {field: 'id', title: 'ID', width:80,align:'center', sort: true} 
       ,{field: 'username', title: '玩家名称',align:'center', width:180}
       ,{field: 'sex', title: '公会职位', align:'center',width:180}
       ,{field: 'username', title: '捐献总额', width:180,align:'center', sort: true}
       ,{field: 'sex', title: '在线时长', width:180, align:'center',sort: true}
       ,{field: 'username', title: '离线时间', align:'center',width:180}
       ,{fixed: 'right', width:150, align:'center', toolbar: '#delete'} //请离公会成员

  
     ]]
   });
   
 });
 </script>
</body>
</html>
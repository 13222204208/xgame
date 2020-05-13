<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>奖池编辑</title>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>

<body>

  <table id="demo" lay-filter="test"></table>

  <script type="text/html" id="barDemo">
    <!--     <a class="layui-btn layui-btn-xs" lay-event="detail">查看广告</a> -->
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  </script>

  <div class="layui-row" id="popUpdateTest" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="formUpdate" style="margin:20px">

    <div class="layui-form-item">
          <label class="layui-form-label">白银奖池</label>
          <div class="layui-input-block">
            <input type="number" name="f_silver_count" required lay-verify="number" autocomplete="off" placeholder="请输入数量" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">黄金奖池</label>
          <div class="layui-input-block">
            <input type="number" name="f_gold_count" required lay-verify="number" autocomplete="off" placeholder="请输入数量" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">钻石奖池</label>
          <div class="layui-input-block">
            <input type="number" name="f_diamond_count" required lay-verify="number" autocomplete="off" placeholder="请输入数量" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">倍率类型</label>
          <div class="layui-input-block">
            <input type="radio" name="f_is_default" value="0" title="第一种类">
            <input type="radio" name="f_is_default" value="1" title="第二种类" checked>
          </div>
        </div>


      <div class="layui-form-item ">
        <div class="layui-input-block">
          <div class="layui-footer" style="left: 0;">
            <button class="layui-btn" lay-submit="" lay-filter="updateData">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </div>
    </form>
  </div>




  <script src="/layuiadmin/layui/layui.js"></script>
  <script src="/layuiadmin/layui/jquery3.2.js"></script>
  <script>
    layui.use(['table', 'form', 'laydate', 'util'], function() {
      var table = layui.table;
      var laydate = layui.laydate;
      var form = layui.form;
      var util = layui.util;
      //var $ = layui.jquery
      form.render(null, 'component-form-group');




      //第一个实例
      table.render({
        elem: '#demo',
        height: 600,
        url: "{{url('/edit/turntable')}}" //数据接口
          ,
        page: true //开启分页
          ,
        cols: [
          [ //表头
            {
              field: 'f_id',
              title: 'ID',
              width: 80,
              align: 'center',
              sort: true
            },
            {
              field: 'f_silver_count',
              title: '白银奖池',
              align: 'center',

              width: 280
            },
            {
              field: 'f_gold_count',
              title: '黄金奖池',
              align: 'center',
              width: 280
            },
         {
              field: 'f_diamond_count',
              title: '钻石奖池',
              align: 'center',
              width: 280
            },
            {
              field: 'f_is_default',
              title: '类型',
              align: 'center',
              templet: function(d) {
                if (d.f_is_default == 1) {
                  return "第二种类";
                } else  {
                  return "第一种类";
                }
              },
              width: 180
            }, {
              fixed: 'right',
              width: 80,
              align: 'center',
              toolbar: '#barDemo'
            } //广告编辑
          ]
        ],
        parseData: function(res) { //res 即为原始返回的数据

          return {
            "code": '0', //解析接口状态
            "msg": res.message, //解析提示文本
            "count": res.total, //解析数据长度
            "data": res.data //解析数据列表
          }
        },
        toolbar: '#toolbarDemo',
        title: '后台广告管理',
        totalRow: true

      });


      table.on('tool(test)', function(obj) { //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
        var tr = obj.tr; //获得当前行 tr 的 DOM 对象（如果有的话）

      if (layEvent === 'edit') { //编辑

          layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "编辑奖池内容",
            area: ['620px', '400px'],
            content: $("#popUpdateTest") //引用的弹出层的页面层的方式加载修改界面表单
          });

          form.val("formUpdate", data);
          setFormValue(obj, data);

        } else if (layEvent === 'LAYTABLE_TIPS') {
          layer.alert('Hi，头部工具栏扩展的右侧图标。');
        }
      });
      //更新广告信息
      //监听弹出框表单提交，massage是修改界面的表单数据'submit(demo11),是修改按钮的绑定
      function setFormValue(obj, data) {
        form.on('submit(updateData)', function(massage) {
          console.log(data.f_id);
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/update/turntable')}}",
            type: 'post',
            data: {
              f_id: data.f_id,
              f_diamond_count: massage.field.f_diamond_count,
              f_gold_count: massage.field.f_gold_count,
              f_silver_count: massage.field.f_silver_count,
              f_is_default: massage.field.f_is_default,
            },
            success: function(msg) {
              console.log(msg);
              if (msg == '{"status":200}') {
                layer.closeAll('loading');
                layer.load(2);
                layer.msg("修改成功", {
                  icon: 6
                });
                setTimeout(function() {

                  obj.update({
                    f_diamond_count: massage.field.f_diamond_count,
                    f_gold_count: massage.field.f_gold_count,
                    f_silver_count: massage.field.f_silver_count,
                    f_is_default: massage.field.f_is_default,
                  }); //修改成功修改表格数据不进行跳转 
 
             
                  layer.closeAll(); //关闭所有的弹出层
                  //window.location.href = "/edit/horse-info";

                }, 1000);

              } else {
                layer.msg("修改失败", {
                  icon: 5
                });
              }
            }
          })
          return false;
        })

      }

    });
  </script>
</body>

</html>
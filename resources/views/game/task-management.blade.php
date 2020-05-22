<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>跑马灯编辑</title>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>

<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">

          <div class="layui-card-body" pad15>

            <div class="layui-form" lay-filter="">
              <div class="layui-card-body">
                <div class="layui-upload">
                  <button type="button" class="layui-btn" id="task-management">新建任务</button>
         
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <table id="demo" lay-filter="test"></table>

  <script type="text/html" id="barDemo">
  
 <!--  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> -->
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
  </script>

  <div class="layui-row" id="popUpdateTest" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="formUpdate" style="margin:20px">

 

      <div class="layui-form-item">
        <label class="layui-form-label">游戏类型</label>
        <div class="layui-input-block">
          <select name="f_weights" required lay-verify="required">
            <option value="">全部游戏</option>
            <option value="3">王牌小丑</option>
            <option value="2">三色龙珠</option>
            <option value="1">太上老君</option>
            <option value="1">神兽单挑</option>

          </select>
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">场次类型</label>
        <div class="layui-input-block">
          <select name="f_weights" required lay-verify="required">
            <option value="1">1元场</option>
            <option value="5">5元场</option>
            <option value="10">10元场</option>
            <option value="20">20元场</option>
            <option value="50">50元场</option>
            <option value="100">100元场</option>

          </select>
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">任务条件</label>
        <div class="layui-input-block">
          <select name="f_weights" required lay-verify="required">
            <option value="1">小四条以上牌型</option>
            <option value="5">正宗小四条以上</option>
            <option value="10">压注次数</option>
            <option value="20">赢分</option>
            <option value="50">押注金额</option>
            <option value="100">洗码量获得</option>

          </select>
        </div>
      </div>

      
      <div class="layui-form-item">
          <label class="layui-form-label">条件数量</label>
          <div class="layui-input-block">
            <input type="number" name="f_title" required lay-verify="required" autocomplete="off" placeholder="请输入条件数量" class="layui-input">
          </div>
        </div>

        
        <div class="layui-form-item">
          <label class="layui-form-label">奖励金额</label>
          <div class="layui-input-block">
            <input type="number" name="f_title" required lay-verify="required" autocomplete="off" placeholder="请输入奖励金额" class="layui-input">
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
    layui.use(['table', 'form', 'laydate', 'util','jquery'], function() {
      var table = layui.table;
      var laydate = layui.laydate;
      var form = layui.form;
      var util = layui.util;
      var $ = layui.jquery;
      form.render(null, 'component-form-group');

      $(document).on('click','#task-management',function(){
        layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "新建任务",
            area: ['620px', '480px'],
            content: $("#popUpdateTest") //引用的弹出层的页面层的方式加载修改界面表单
          });
        });

      //第一个实例
      table.render({
        elem: '#demo',
        height: 600,
        url: "{{url('/edit/horse')}}" //数据接口
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
              field: 'f_weights',
              title: '标题',
              align: 'center',
              templet: function(d) {
                if (d.f_weights == 1) {
                  return "普通消息";
                } else if (d.f_weights == 2) {
                  return "重大更新";
                } else if (d.f_weights == 3) {
                  return "停服公告";
                }
              },
              width: 100
            },
            {
              field: 'f_text',
              title: '公告内容',
              align: 'center',
              width: 280
            },{
              field: 'f_openday',
              title: '启用日期',
              width: 200,
              align: 'center',
              templet: function(d) {
                return util.toDateString(d.f_openday * 1000, "yyyy-MM-dd ");
              },
              sort: true
            }, {
              field: 'f_closeday',
              title: '关闭日期',
              align: 'center',
              width: 200,
              templet: function(d) {
                return util.toDateString(d.f_closeday * 1000, "yyyy-MM-dd ");
              },
              sort: true
            },
            {
              field: 'f_opentime',
              title: '启用时间',
              width: 200,
              align: 'center',
              templet: function(d) {
                return util.toDateString(d.f_opentime * 1000, " HH:mm:ss");
              },
              sort: true
            }, {
              field: 'f_closetime',
              title: '关闭时间',
              align: 'center',
              width: 200,
              templet: function(d) {
                return util.toDateString(d.f_closetime * 1000, " HH:mm:ss");
              },
              sort: true
            },
            {
              field: 'f_waitime',
              title: '间隔时间',
              align: 'center',
              templet: function(d) {
                return d.f_waitime + '秒';
              },
              width: 120
            },  {
              fixed: 'right',
              width: 150,
              align: 'center',
              toolbar: '#barDemo'
            } //广告编辑
          ]
        ],
        parseData: function(res) { //res 即为原始返回的数据
          console.log(res);
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

        if (layEvent === 'del') { //删除
          layer.confirm('真的删除行么', function(index) {
            $.ajax({
              url: "{{url('/del/horse')}}",
              type: 'get',
              datatype: 'json',
              data: {
                'id': data.f_id
              }, //向服务端发送删除的id
              success: function(res) {
                console.log(res);
                if (res == '{"status":200}') {
                  obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                  layer.close(index);
                  console.log(index);
                  layer.msg("删除成功", {
                    icon: 1
                  });
                } else {
                  layer.msg("删除失败", {
                    icon: 5
                  });
                }
              }
            });
            layer.close(index);
            //向服务端发送删除指令
          });
        } else if (layEvent === 'edit') { //编辑

          layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "编辑广告内容",
            area: ['620px', '630px'],
            content: $("#popUpdateTest") //引用的弹出层的页面层的方式加载修改界面表单
          });

          form.val("formUpdate", data);
          setFormValue(obj, data);
          var stime = util.toDateString(data.f_opentime * 1000, "HH:mm:ss");//启用时间
          var ctime = util.toDateString(data.f_closetime * 1000, "HH:mm:ss");//关闭时间

          var sdate = util.toDateString(data.f_openday * 1000, "yyyy-MM-dd");//启用日期
          var cdate = util.toDateString(data.f_closeday * 1000, "yyyy-MM-dd");//关闭日期
          laydate.render({
            elem: '#LAY-component-form-start-time',
            value: stime,
            type: 'time'
          });

          laydate.render({
            elem: '#LAY-component-form-over-time',
            value: ctime,
            type: 'time'
          });

          laydate.render({
            elem: '#LAY-component-form-start-date',
            value:sdate,
            type: 'date'
          });

          laydate.render({
            elem: '#LAY-component-form-over-date',
            value: cdate,
            type: 'date'
          });
        

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
            url: "{{url('/update/horse')}}",
            type: 'post',
            data: {
              f_id: data.f_id,
              f_weights: massage.field.f_weights,
              f_text: massage.field.f_text,
              f_openday: massage.field.f_openday,
              f_closeday: massage.field.f_closeday,
              f_opentime: massage.field.f_opentime,
              f_closetime: massage.field.f_closetime,
              f_waitime: massage.field.f_waitime,
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
                  function changetime(mytime){
                    var date = mytime;
                      date = date.substring(0,19);    
                      date = date.replace(/-/g,'/'); //必须把日期'-'转为'/'
                      var timestamp = new Date(date).getTime()/1000;
                      return timestamp;
                  }
                  obj.update({
                    f_weights: massage.field.f_weights,
                    f_text: massage.field.f_text,
                    f_openday: changetime(massage.field.f_openday),
                    f_closeday: changetime(massage.field.f_closeday),
                    f_opentime: changetime(massage.field.f_opentime),
                    f_closetime: changetime(massage.field.f_closetime),
                    f_waitime: massage.field.f_waitime,
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
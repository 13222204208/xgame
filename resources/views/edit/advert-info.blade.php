<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>广告编辑</title>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>

<body>

  <table id="demo" lay-filter="test"></table>

  <script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="detail">查看广告</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
  </script>

  <div class="layui-row" id="popUpdateTest" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="formUpdate" style="margin-top:20px">

      <div class="layui-col-md10">

        <div class="layui-form-item">
          <label class="layui-form-label">标题</label>
          <div class="layui-input-block">
            <input type="text" name="f_title" required lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">公告内容</label>
          <div class="layui-input-block">
            <input type="text" name="f_text" required lay-verify="required" autocomplete="off" placeholder="请输入公告内容" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">显示位置</label>
          <div class="layui-input-block">
            <input type="text" name="f_view_type" required lay-verify="required" autocomplete="off" placeholder="请输入显示位置" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">跳转的URL</label>
          <div class="layui-input-block">
            <input type="text" name="f_ok_jump" required lay-verify="required" autocomplete="off" placeholder="请输入跳转的URL" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">图片链接</label>
          <div class="layui-input-block">
            <input type="text" name="f_img_url" required lay-verify="required" autocomplete="off" placeholder="请输入图片链接" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">权重</label>
          <div class="layui-input-block">
            <input type="text" name="f_weight" required lay-verify="required" autocomplete="off" placeholder="请输入数字，数字越大权重越高" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">公告状态</label>
          <div class="layui-input-block">
            <input type="checkbox" checked="" id="switchID" required lay-verify="required" name="f_enable" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
          </div>
        </div>

        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">启用时间</label>
            <div class="layui-input-inline">
              <input type="text" class="layui-input" required lay-verify="required" name='f_opentime' id="f_opentime" placeholder="yyyy-MM-dd HH:mm:ss">
            </div>
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">关闭时间</label>
            <div class="layui-input-inline">
              <input type="text" class="layui-input" required lay-verify="required" name='f_closetime' id="f_closetime" placeholder="yyyy-MM-dd HH:mm:ss">
            </div>
          </div>
        </div>




        <div class="layui-form-item" style="margin-top:40px">
          <div class="layui-input-block">
            <button class="layui-btn  " lay-submit="" lay-filter="updateData">确认修改</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
      laydate.render({ //日期时间选择器
        elem: '#f_opentime',
        type: 'datetime'
      });

      laydate.render({
        elem: '#f_closetime',
        type: 'datetime'
      });


      //第一个实例
      table.render({
        elem: '#demo',
        height: 600,
        url: "{{url('/edit/advert')}}" //数据接口
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
              field: 'f_title',
              title: '标题',
              align: 'center',
              width: 100
            },
            {
              field: 'f_text',
              title: '公告内容',
              align: 'center',
              width: 280
            },
            {
              field: 'f_view_type',
              title: '显示位置',
              align: 'center',
              width: 80
            },
            {
              field: 'f_ok_jump',
              title: '跳转的URL',
              align: 'center',
              width: 120
            }, {
              field: 'f_img_url',
              title: '图片链接地址',
              align: 'center',
              width: 120
            }, {
              field: 'f_weight',
              title: '权重',
              align: 'center',
              width: 120,
              sort: true
            }, {
              field: 'f_enable',
              title: '公告状态',
              width: 120,
              align: 'center',
              templet: function(d) {
                if (d.f_enable == 1) {
                  return '<input type="checkbox" checked="checked" required lay-verify="required" name="f_enable" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">'
                } else {
                  return '<input type="checkbox" required lay-verify="required" name="f_enable" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">'
                }
              },
              sort: true
            }, {
              field: 'f_opentime',
              title: '启用时间',
              width: 200,
              align: 'center',
              templet: function(d) {
                return util.toDateString(d.f_opentime * 1000, "yyyy-MM-dd HH:mm:ss");
              },
              sort: true
            }, {
              field: 'f_closetime',
              title: '关闭时间',
              align: 'center',
              width: 200,
              templet: function(d) {
                return util.toDateString(d.f_closetime * 1000, "yyyy-MM-dd HH:mm:ss");
              },
              sort: true
            }, {
              fixed: 'right',
              width: 250,
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

        if (layEvent === 'detail') { //查看
          // var img = '<img src="'+window.location.protocol+"//"+window.location.host+'/'+data.img_url+'"'+"/>'";
          var img = '<img src="' + data.f_img_url + '"' + "/>'";

          layer.open({
            type: 1, //Page层类型
            shade: 0.6, //遮罩透明度
            maxmin: true, //允许全屏最小化
            anim: 1, //0-6的动画形式，-1不开启
            content: img,
            cancel: function() {
              //右上角关闭回调
            }
          });
        } else if (layEvent === 'del') { //删除
          layer.confirm('真的删除行么', function(index) {
            $.ajax({
              url: "{{url('/del/advert')}}",
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
          console.log(data);
          setFormValue(obj, data);
          
        var openTakeaway = data.f_enable; 
        if (openTakeaway == 1) {
          $("#switchID").prop("checked", true);
        } else {
          $("#switchID").prop("checked", false);
        }
        var stime = util.toDateString(data.f_opentime * 1000, "yyyy-MM-dd HH:mm:ss");
        var ctime = util.toDateString(data.f_closetime * 1000, "yyyy-MM-dd HH:mm:ss");
      laydate.render({ //日期时间选择器
        elem: '#f_opentime',
        value:stime,
        type: 'datetime'
      });

      laydate.render({
        elem: '#f_closetime',
        value:ctime,
        type: 'datetime'
      });
        form.render();    

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
            url: "{{url('/update/advert')}}",
            type: 'post',
            data: {
              f_id: data.f_id,
              f_title: massage.field.f_title,
              f_text: massage.field.f_text,
              f_view_type: massage.field.f_view_type,
              f_ok_jump: massage.field.f_ok_jump,
              f_img_url: massage.field.f_img_url,
              f_weight: massage.field.f_weight,
              f_enable: massage.field.f_enable,
              f_opentime: massage.field.f_opentime,
              f_closetime: massage.field.f_closetime
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
                  function changetime(mytime){//更改日期为时间戳
                    var date = mytime;
                      date = date.substring(0,19);    
                      date = date.replace(/-/g,'/'); //必须把日期'-'转为'/'
                      var timestamp = new Date(date).getTime()/1000;
                      return timestamp;
                  }
                  obj.update({
                    f_title: massage.field.f_title,
                    f_text: massage.field.f_text,
                    f_view_type: massage.field.f_view_type,
                    f_ok_jump: massage.field.f_ok_jump,
                    f_img_url: massage.field.f_img_url,
                    f_weight: massage.field.f_weight,
                    f_enable: massage.field.f_enable,
                    f_opentime: changetime(massage.field.f_opentime),
                    f_closetime: changetime(massage.field.f_closetime)
                  }); //修改成功修改表格数据不进行跳转 
                  layer.closeAll(); //关闭所有的弹出层
                  window.location.href ="/edit/advert-info";
                  
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
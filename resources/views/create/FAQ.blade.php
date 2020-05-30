<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>常见问题</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="{{ asset('layuiadmin/layui/css/layui.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('layuiadmin/style/admin.css') }}" media="all">
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
                  <button type="button" class="layui-btn" id="FAQ">新建类型</button>

                </div>

              </div><br>
              <div class="layui-form-item" style="width:420px" >
                <label class="layui-form-label">问题类型</label>
                <div class="layui-input-inline">
                  <select name="qtype" lay-verify="required" id="insertData" lay-filter="qtypename">
                    <option value=""></option>
                  </select>
                  
                </div>
               <button class="layui-btn" lay-filter="createQtype" id="newQuestion">新建问题</button>
              </div>
              <table id="demo" lay-filter="test"></table>
              <script type="text/html" id="barDemo">

    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
  </script>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="layui-row" id="createFAQ" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="qtype" lay-filter="updateTask" style="margin:20px">


      <div class="layui-form-item">
        <label class="layui-form-label">类型名称</label>
        <div class="layui-input-block">
          <input type="text" name="f_title" required lay-verify="qtype" autocomplete="off" placeholder="请输入类型名称" class="layui-input">
        </div>
      </div>



      <div class="layui-form-item ">
        <div class="layui-input-block">
          <div class="layui-footer" style="left: 0;">
            <button class="layui-btn" lay-submit="" lay-filter="createQtype">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="layui-row" id="createQuestion" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="cquerstion" lay-filter="updateTask" style="margin:20px">


      <div class="layui-form-item">
        <label class="layui-form-label">问题名称</label>
        <div class="layui-input-block">
          <input type="text" name="f_question" required lay-verify="f_question" autocomplete="off" placeholder="请输入问题名称" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">问题答案</label>
        <div class="layui-input-block">
          <input type="text" name="f_answer" required lay-verify="f_answer" autocomplete="off" placeholder="请输入问题答案" class="layui-input">
        </div>
      </div>



      <div class="layui-form-item ">
        <div class="layui-input-block">
          <div class="layui-footer" style="left: 0;">
            <button class="layui-btn" lay-submit="" lay-filter="referQuestion">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="layui-row" id="editQuesAnswer" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required"  lay-filter="updateTask" style="margin:20px">


      <div class="layui-form-item">
        <label class="layui-form-label">问题名称</label>
        <div class="layui-input-block">
          <input type="text" name="f_question" required lay-verify="f_question" autocomplete="off" placeholder="请输入问题名称" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">问题答案</label>
        <div class="layui-input-block">
          <input type="text" name="f_answer" required lay-verify="f_answer" autocomplete="off" placeholder="请输入问题答案" class="layui-input">
        </div>
      </div>



      <div class="layui-form-item ">
        <div class="layui-input-block">
          <div class="layui-footer" style="left: 0;">
            <button class="layui-btn" lay-submit="" lay-filter="updateQuestion">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </div>
    </form>
  </div>



  <script src="/layuiadmin/layui/layui.js"></script>
  <script src="/layuiadmin/layui/jquery3.2.js"></script>
  <script>
    layui.use(['table', 'form', 'laydate', 'util', 'jquery'], function() {
      var table = layui.table;
      var laydate = layui.laydate;
      var form = layui.form;
      var util = layui.util;
      var $ = layui.jquery;

      $(document).on('click', '#FAQ', function() {
        layer.open({
          //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
          type: 1,
          title: "新建类型",
          area: ['620px', '200px'],
          content: $("#createFAQ") //引用的弹出层的页面层的方式加载修改界面表单
        });
      });

      form.verify({
        qtype: function(value) {
          if (value.length > 4) {
            return "不能大于四个字符";
          }
        }
      });

      form.on('submit(createQtype)', function(data) {


        qtype = data.field;
        console.log(qtype);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{url('/create/question/type')}}",
          type: 'post',
          data: qtype,
          success: function(msg) {
            console.log(msg);
            // return false;
            if (msg.status == 200) {

              layer.msg("新建成功", {
                icon: 6
              });
              setTimeout(function() {
                layer.closeAll(); //关闭所有的弹出层
                window.location.href = "/create/FAQ";
              }, 2000);

            } else {
              layer.msg("新建失败", {
                icon: 5
              });
            }
          }
        })
        return false;
      });


      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{url('/get/question/type')}}",
        method: 'get',

        success: function(res) {
          //	console.log(res);
          $.each(res, function(i, t) {
            //  $("#insertData").append('1');
            $("#insertData").append('<option value="' + t.f_type + '">' + t.f_title + '</option>');
          });
          form.render('select');
        },

      });





      form.on('select(qtypename)', function(data) {
        let tid = Number(data.value);
        //let num = $('#f_mission_event').val();
       
        console.log(tid);
        url = "/get/game/question/" + tid;
        table.render({
          elem: '#demo',
          height: 600,
          url: url //数据接口
            ,
          page: true //开启分页
            ,
          cols: [
            [ //表头
              {
                field: 'f_question',
                title: '问题',
                width: 150,
                align: 'center'

              },
              {
                field: 'f_answer',
                title: '答案',
                width: 650,
                align: 'center'

              }, {
              fixed: 'right',
              width: 250,
              align: 'center',
              toolbar: '#barDemo'
            } //问题编辑
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
        
        return false;
       
      });



      $(document).on('click', '#newQuestion', function() {
       var qtype= $("select[name='qtype'] option:selected").val();
        if (qtype != "") {
          layer.open({
          //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
          type: 1,
          title: "新建问题",
          area: ['620px', '300px'],
          content: $("#createQuestion") //引用的弹出层的页面层的方式加载修改界面表单
        });
        }else{
          layer.msg("请先选择问题类型", {
                icon: 2
              });
              setTimeout(function() {
                layer.closeAll(); //关闭所有的弹出层
                //window.location.href = "/create/FAQ";
              }, 2000);
        }

      });

      form.on('submit(referQuestion)', function(data) {
        
        data = data.field;
        data.f_type = $("select[name='qtype'] option:selected").val();
        //console.log(data);return false;
        
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{url('/add/question/answer')}}",
          type: 'post',
          data: data,
          success: function(msg) {
            console.log(msg);
            // return false;
            if (msg.status == 200) {

              layer.msg("新建成功", {
                icon: 6
              });
              setTimeout(function() {
                layer.closeAll(); //关闭所有的弹出层
                window.location.href = "/create/FAQ";
              }, 2000);

            } else {
              layer.msg("新建失败", {
                icon: 5
              });
            }
          }
        })
        return false;
        });







      table.on('tool(test)', function(obj) { //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
        var tr = obj.tr; //获得当前行 tr 的 DOM 对象（如果有的话）
//console.log(data);return false;

                if (layEvent === 'del') { //删除
                  layer.confirm('真的删除行么', function(index) {
                    $.ajax({
                      url: "{{url('/del/question')}}",
                      type: 'get',
                      datatype: 'json',
                      data: {
                        'id': data.f_id
                      }, //向服务端发送删除的id
                      success: function(res) {
                        console.log(res);
                        if (res.status == 200) {
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
                } else if(layEvent === 'edit'){ //编辑

          layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "编辑任务",
            area: ['620px', '300px'],
            content: $("#editQuesAnswer") //引用的弹出层的页面层的方式加载修改界面表单
          });
          // console.log(data);
          form.val("updateTask", data);
          setFormValue(obj, data);

        

          form.render();
        }
      });
      //更新广告信息
      //监听弹出框表单提交，massage是修改界面的表单数据'submit(demo11),是修改按钮的绑定
      function setFormValue(obj, data) {
        form.on('submit(updateQuestion)', function(massage) {
         
         updateData= massage.field;
         updateData.f_id = data.f_id;
         console.log(updateData);return false;
          updateData = massage.field;
          // console.log(updateData); return false;
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/update/question')}}",
            type: 'post',
            data: updateData,
            success: function(msg) {
              console.log(msg);
              if (msg == '{"status":200}') {
                layer.closeAll('loading');
                layer.load(2);
                layer.msg("修改成功", {
                  icon: 6
                });
                setTimeout(function() {

                  layer.closeAll(); //关闭所有的弹出层
                  window.location.href = "/game/task-management";

                }, 2000);

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
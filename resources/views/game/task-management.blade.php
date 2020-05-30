<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>任务管理</title>
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
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <!--   <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> -->
  </script>

  <div class="layui-row" id="popCreateTask" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" style="margin:20px">

      <div class="layui-form-item">
        <label class="layui-form-label">任务描述</label>
        <div class="layui-input-block">
          <input type="text" name="f_mission_content" required lay-verify="required" autocomplete="off" placeholder="请输入任务描述" value="无" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">任务条件</label>
        <div class="layui-input-inline">
          <select name="f_mission_event" required id="f_mission_event">
            <option value="0">请选择条件</option>
            <option value="1">压注次数</option>
            <option value="2">赢分</option>
            <option value="3">押注金额</option>
            <option value="4">洗码量获得</option>
            <option value="5">小四条以上牌型</option>
            <option value="6">正宗小四条以上</option>
          </select>
        </div>

      </div>



      <div class="layui-form-item">
        <label class="layui-form-label">场次类型</label>
        <div class="layui-input-block">
          <select name="f_bottom_point" required lay-filter="f_bottom_point">
            <option value="0">全部场次</option>
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
        <label class="layui-form-label">对应游戏</label>
        <div class="layui-input-block">
          <select name="f_mission_game" required>
            <option value="">请选择游戏</option>
          </select>
        </div>
      </div>





      <div class="layui-form-item">
        <label class="layui-form-label">任务权重</label>
        <div class="layui-input-block">
          <input type="number" name="f_mission_weight" required lay-verify="required" autocomplete="off" placeholder="请输入任务权重" class="layui-input">
        </div>
      </div>


      <div class="layui-form-item">
        <label class="layui-form-label">任务数量</label>
        <div class="layui-input-block">
          <input type="number" name="f_mission_count" required lay-verify="required" autocomplete="off" placeholder="请输入任务数量" class="layui-input">
        </div>
      </div>


      <div class="layui-form-item">
        <label class="layui-form-label">任务奖励</label>
        <div class="layui-input-block">
          <input type="number" name="f_mission_reward" required lay-verify="required" autocomplete="off" placeholder="请输入奖励金额" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">是否每日刷新</label>
        <div class="layui-input-block">
          <input type="checkbox" checked required lay-verify="required" name="f_mission_day_refresh" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
        </div>
      </div>

      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">启用时间</label>
          <div class="layui-input-inline">
            <input type="text" class="layui-input" required lay-verify="required" name='f_mission_start_time' id="f_opentime" placeholder="yyyy-MM-dd HH:mm:ss">
          </div>
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">关闭时间</label>
          <div class="layui-input-inline">
            <input type="text" class="layui-input" required lay-verify="required" name='f_mission_close_time' id="f_closetime" placeholder="yyyy-MM-dd HH:mm:ss">
          </div>
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">任务状态</label>
        <div class="layui-input-block">
          <input type="checkbox" checked required lay-verify="required" name="f_mission_state" lay-skin="switch" lay-text="开启|关闭">
        </div>
      </div>


      <div class="layui-form-item ">
        <div class="layui-input-block">
          <div class="layui-footer" style="left: 0;">
            <button class="layui-btn" lay-submit="" lay-filter="createTask">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </div>
    </form>
  </div>


  <div class="layui-row" id="popUpdateTask" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="updateTask" style="margin:20px">

      <div class="layui-form-item">
        <label class="layui-form-label">任务描述</label>
        <div class="layui-input-block">
          <input type="text" name="f_mission_content" required lay-verify="required" autocomplete="off" placeholder="请输入任务描述" value="无" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">任务权重</label>
        <div class="layui-input-block">
          <input type="number" name="f_mission_weight" required lay-verify="required" autocomplete="off" placeholder="请输入任务权重" class="layui-input">
        </div>
      </div>


      <!--       <div class="layui-form-item">
        <label class="layui-form-label">任务数量</label>
        <div class="layui-input-block">
          <input type="number" name="f_mission_count" required lay-verify="required" autocomplete="off" placeholder="请输入任务数量" class="layui-input">
        </div>
      </div> -->


      <div class="layui-form-item">
        <label class="layui-form-label">任务奖励</label>
        <div class="layui-input-block">
          <input type="number" name="f_mission_reward" required lay-verify="required" autocomplete="off" placeholder="请输入奖励金额" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">是否每日刷新</label>
        <div class="layui-input-block">
          <input type="checkbox" checked="" required lay-verify="required" name="f_mission_day_refresh" lay-skin="switch" id="taskRefresh" lay-filter="switchTest" lay-text="是|否">
        </div>
      </div>

      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">启用时间</label>
          <div class="layui-input-inline">
            <input type="text" class="layui-input" required lay-verify="required" name='f_mission_start_time' id="f_mission_start_time" placeholder="yyyy-MM-dd HH:mm:ss">
          </div>
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">关闭时间</label>
          <div class="layui-input-inline">
            <input type="text" class="layui-input" required lay-verify="required" name='f_mission_close_time' id="f_mission_close_time" placeholder="yyyy-MM-dd HH:mm:ss">
          </div>
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">任务状态</label>
        <div class="layui-input-block">
          <input type="checkbox" checked="" required lay-verify="required" name="f_mission_state" lay-skin="switch" id="taskState" lay-text="开启|关闭">
        </div>
      </div>


      <div class="layui-form-item ">
        <div class="layui-input-block">
          <div class="layui-footer" style="left: 0;">
            <button class="layui-btn" lay-submit="" lay-filter="updateOneTask">立即提交</button>
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
      /* 
            form.on('select(f_mission_event)', function(data) {
              let num= Number(data.value);
              let arr = [1,2,3,4];
              let arr2 = [5,6];

              if (arr.includes(num)) {
                $("#f_mission_game").html( '<option value="">全部游戏</option>'+
                  '<option value="3">王牌小丑</option>'+
                 ' <option value="2">三色龙珠</option>'+
                  '<option value="1">太上老君</option>'+
                  '<option value="1">神兽单挑</option>');
              }else if (arr2.includes(num)) {
                $("#f_mission_game").html( 
                  '<option value="3">王牌小丑</option>');
              }
                form.render('select'); 

            }); */

      form.on('select(f_bottom_point)', function(data) {
        let req = Number(data.value);
        let num = $('#f_mission_event').val();

        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{url('/query/task/requirement')}}",
          type: 'post',
          data: {
            num: num,
            req: req
          },
          success: function(msg) {
            console.log(msg);
            status = msg.status;
            res = msg.game;
            if (status == 200) {

              /*                 $.each(res, function(i, t) {
                          $("#f_mission_game").append('<option value="'+t.f_room_type+'">'+t.f_room_type+'</option>');        
                        }); */
              options = "";
              game = "";
              for (var i = 0; i < res.length; i++) {
                var t = res[i];


                switch (t.f_room_type) {
                  case "TWL":
                    game = "太上老君";
                    break;
                  case "Ssdt":
                    game = "神兽单挑";
                    break;
                  case "Sslz":
                    game = "三色龙珠";
                    break;
                  case "FanPai":
                    game = "王牌小丑";
                    break;
                }
                options += '<option value="' + t.f_room_type + '">' + game + '</option>';
              }


              if (res.length == 4) {
                $("select[name='f_mission_game']").html('<option value="all">全部游戏</option>' + options);
              } else {
                $("select[name='f_mission_game']").html(options);
              }
              form.render('select');


            } else {
              layer.msg("修改失败", {
                icon: 5
              });
            }
          }
        });
        return false;

      });

      form.on('submit(createTask)', function(data) {
        if (data.field.f_mission_day_refresh == "on") { //每日刷新
          data.field.f_mission_day_refresh = 1;
        } else {
          data.field.f_mission_day_refresh = 2;
        }

        if (data.field.f_mission_state == "on") { //任务状态
          data.field.f_mission_state = 1;
        } else {
          data.field.f_mission_state = 2;
        }

        task = data.field;
        console.log(task);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{url('/create/game/task')}}",
          type: 'post',
          data: task,
          success: function(msg) {
            console.log(msg);
            // return false;
            if (msg == '{"status":200}') {
              layer.closeAll('loading');
              layer.load(2);
              layer.msg("新建成功", {
                icon: 6
              });
              setTimeout(function() {
                layer.closeAll(); //关闭所有的弹出层
                window.location.href = "/game/task-management";
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

      laydate.render({ //日期时间选择器
        elem: '#f_opentime',
        type: 'datetime'
      });

      laydate.render({
        elem: '#f_closetime',
        type: 'datetime'
      });
      form.render(null, 'component-form-group');

      $(document).on('click', '#task-management', function() {
        layer.open({
          //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
          type: 1,
          title: "新建任务",
          area: ['620px', '780px'],
          content: $("#popCreateTask") //引用的弹出层的页面层的方式加载修改界面表单
        });
      });

      //第一个实例
      table.render({
        elem: '#demo',
        height: 600,
        url: "{{url('/check/game/task')}}" //数据接口
          ,
        page: true //开启分页
          ,
        cols: [
          [ //表头
            {
              field: 'f_mission_id',
              title: 'ID',
              width: 80,
              align: 'center',
              sort: true
            },
            {
              field: 'f_mission_content',
              title: '任务描述',
              align: 'center',
              width: 120
            },
            {
              field: 'f_mission_weight',
              title: '权重',
              align: 'center',
              width: 80,
              sort: true
            }, {
              field: 'f_mission_count',
              title: '任务数量',
              width: 110,
              align: 'center',
              sort: true
            }, {
              field: 'f_mission_reward',
              title: '任务奖励',
              align: 'center',
              width: 130,
              sort: true
            },
            {
              field: 'f_mission_event',
              title: '任务类型',
              width: 130,
              align: 'center',
              templet: function(d) {

                switch (d.f_mission_event) {
                  case 1:
                    return "压注次数";
                  case 2:
                    return "赢分";
                  case 3:
                    return "压注金额";
                  case 4:
                    return "洗码量获得";
                  case 5:
                    return "小四条以上牌型";
                  case 6:
                    return "正宗小四条以上";
                }
              },
              sort: true
            }, {
              field: 'f_bottom_point',
              title: '场次类型',
              width: 130,
              align: 'center',
              templet: function(d) {
               // console.log(d.f_mission_consume);
                if (d.f_mission_consume === 0) {
                  return "全部场次";
                } else {
                  return d.f_bottom_point+"元场";
        

                }
              },
              sort: true
            }, {
              field: 'f_mission_game',
              title: '游戏名称',
              align: 'center',
              width: 150,
              templet: function(d) {
                switch (d.f_mission_game) {
                  case "TWL":
                    return "太上老君";
                    break;
                  case "Ssdt":
                    return "神兽单挑";
                    break;
                  case "Sslz":
                    return "三色龙珠";
                    break;
                  case "FanPai":
                    return "王牌小丑";
                    break;
                  case "all":
                    return "所有游戏";
                    break;
                }
              },
              sort: true
            },
            {
              field: 'f_mission_day_refresh',
              title: '每日刷新',
              align: 'center',
              templet: function(d) {
                if (d.f_mission_day_refresh == 1) {
                  return "刷新";
                } else {
                  return "不刷新";
                }
              },
              width: 100
            },
            {
              field: 'f_mission_start_time',
              title: '任务开始时间',
              align: 'center',
              templet: function(d) {
                return util.toDateString(d.f_mission_start_time * 1000, " yyyy-MM-dd HH:mm:ss");
              },
              width: 180
            },
            {
              field: 'f_mission_close_time',
              title: '任务结束时间',
              align: 'center',
              templet: function(d) {
                return util.toDateString(d.f_mission_close_time * 1000, " yyyy-MM-dd HH:mm:ss");
              },
              width: 180
            },
            {
              field: 'f_mission_state',
              title: '任务状态',
              align: 'center',
              templet: function(d) {
                if (d.f_mission_state == 1) {
                  return "任务开启";
                } else {
                  return "任务关闭";
                }
              },
              width: 120
            },
            {
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

        /*         if (layEvent === 'del') { //删除
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
                } else  */
        if (layEvent === 'edit') { //编辑

          layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "编辑任务",
            area: ['620px', '550px'],
            content: $("#popUpdateTask") //引用的弹出层的页面层的方式加载修改界面表单
          });
          // console.log(data);
          form.val("updateTask", data);
          setFormValue(obj, data);

          var openTakeaway = data.f_mission_state;
          console.log(openTakeaway);
          if (openTakeaway == 1) {
            $("#taskState").prop("checked", true);
          } else {
            $("#taskState").prop("checked", false);
          }

          var openTakeawayTwo = data.f_mission_day_refresh;
          if (openTakeawayTwo == 1) {
            $("#taskRefresh").prop("checked", true);
          } else {
            $("#taskRefresh").prop("checked", false);
          }

          var stime = util.toDateString(data.f_mission_start_time * 1000, "yyyy-MM-dd HH:mm:ss");
          var ctime = util.toDateString(data.f_mission_close_time * 1000, "yyyy-MM-dd HH:mm:ss");
          laydate.render({ //日期时间选择器
            elem: '#f_mission_start_time',
            value: stime,
            type: 'datetime'
          });

          laydate.render({
            elem: '#f_mission_close_time',
            value: ctime,
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
        form.on('submit(updateOneTask)', function(massage) {
          massage.field.f_mission_id = data.f_mission_id;
          if (massage.field.f_mission_day_refresh == "on") { //每日刷新
            massage.field.f_mission_day_refresh = 1;
          } else {
            massage.field.f_mission_day_refresh = 2;
          }

          if (massage.field.f_mission_state == "on") { //任务状态
            massage.field.f_mission_state = 1;
          } else {
            massage.field.f_mission_state = 2;
          }
          updateData = massage.field;
          // console.log(updateData); return false;
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/update/game/task')}}",
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
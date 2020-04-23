<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>公会编辑</title>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>

<body>

  <table id="demo" lay-filter="test"></table>

  <script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="detail">查看成员</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <!--   <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a> -->
  </script>

  <div class="layui-row" id="popUpdateTest" style="display:none;">
    <form class="layui-form layui-from-pane" required lay-verify="required" lay-filter="formUpdate" style="margin:20px">

      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">公告</label>
        <div class="layui-input-block">
          <textarea name="f_announcement" required placeholder="请输入公告内容" class="layui-textarea"></textarea>
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

  <div class="layui-row" id="popGuildMember" style="display:none;">
    <table id="member" lay-filter="member"></table>

    <script type="text/html" id="barMember">
      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">请离成员</a>
    </script>
  </div>

  <style>
    td .layui-form-select {
      margin-top: -10px;
      margin-left: -15px;
      margin-right: -15px;
      width: 100px;
      border: 0;
      background: transparent;
    }
  </style>


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
        url: "{{url('/edit/guild')}}" //数据接口
          ,
        page: true //开启分页
          ,
        cols: [
          [ //表头
            {
              field: 'f_guild_id',
              title: 'ID',
              width: 80,
              align: 'center',
              sort: true
            },
            {
              field: 'f_name',
              title: '公会名称',
              align: 'center',
              width: 150
            },
            {
              field: 'f_huizhang_name',
              title: '会长名称',
              align: 'center',
              width: 150
            },
            {
              field: 'f_announcement',
              title: '公告',
              width: 400,
              align: 'center',
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
        title: '所有公会',
        totalRow: true

      });


      table.on('tool(test)', function(obj) { //注：tool 是工具条事件名，test 是 table 原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据


        var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
        var tr = obj.tr; //获得当前行 tr 的 DOM 对象（如果有的话）

        if (layEvent === 'detail') { //查看
          layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "查看公会成员",
            area: ['1000px', '730px'],
            content: $("#popGuildMember") //引用的弹出层的页面层的方式加载修改界面表单
          });

          table.render({
            elem: '#member',
            height: 600,
            url: "/guild/member/" + data.f_guild_id //数据接口
              ,
            page: true //开启分页
              ,
            cols: [
              [ //表头
                {
                  field: 'f_role_id',
                  title: '角色ID',
                  width: 100,
                  align: 'center',
                  sort: true
                },
                {
                  field: 'f_nick_name',
                  title: '角色昵称',
                  width: 120,
                  align: 'center',
                },
                {
                  field: 'f_juanxian',
                  title: '捐献总额',
                  align: 'center',
                  width: 150
                },
                {
                  field: 'f_title',
                  title: '职位',
                  align: 'center',
                  templet: function(d) {
                    if (d.f_title == 3) {
                      return '<select name="status" lay-filter="stateSelect" lay-verify="required" data-state="' + d.f_title + '" data-value="' + d.f_role_id + '" >' +
                        '        <option value="3" selected  disabled >成员 </option>' +
                        '        <option value="2">精英</option>' +
                        '        <option value="1">副会长</option>' +
                        '      </select>';
                    } else if (d.f_title == 2) {
                      return '<select name="status" lay-filter="stateSelect" lay-verify="required" data-state="' + d.f_title + '" data-value="' + d.f_role_id + '" >' +
                        '        <option value="3"  >成员 </option>' +
                        '        <option value="2" selected disabled >精英</option>' +
                        '        <option value="1">副会长</option>' +
                        '      </select>';
                    } else if (d.f_title == 1) {
                      return '<select name="status" lay-filter="stateSelect" lay-verify="required" data-state="' + d.f_title + '" data-value="' + d.f_role_id + '" >' +
                        '        <option value="3"  >成员 </option>' +
                        '        <option value="2"  >精英</option>' +
                        '        <option value="1" selected disabled >副会长</option>' +
                        '      </select>';
                    }
                  },
                  width: 150
                },
                {
                  field: 'f_join_time',
                  title: '加入时间',
                  width: 200,
                  templet: function(d) {
                    return util.toDateString(d.f_join_time * 1000, "yyyy-MM-dd HH:mm:ss");
                  },
                  align: 'center',
                }, {
                  fixed: 'right',
                  width: 240,
                  align: 'center',
                  toolbar: '#barMember'
                } //广告编辑
              ]
            ],
            done: function(res, curr, count) {
              //数据渲染完的回调。
              //由于layui 设置了超出隐藏，所以这里改变下，以兼容操作按钮的下拉菜单
              $(".layui-table-body, .layui-table-box, .layui-table-cell").css('overflow', 'visible')
            },
            parseData: function(res) { //res 即为原始返回的数据

              guildID = res.guildID;
              console.log(res);
              return {
                "code": '0', //解析接口状态
                "msg": res.message, //解析提示文本
                "count": res.total, //解析数据长度
                "data": res.data, //解析数据列表
                'guildID': res.guildID
              }
            },
            toolbar: '#toolbarDemo',
            title: '所有公会',
            totalRow: true

          });

          form.on('select(stateSelect)', function(data) { //修改类型
            let f_role_id = data.elem.dataset.value; //当前数据的id
            let f_title = data.elem.value; //当前字段变化的值
            console.log(f_title);
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{url('/update/guild/member/title')}}",
              type: 'post',
              data: {
                'f_role_id': f_role_id,
                'f_title': f_title,
                'f_guild_id': guildID
              },
              success: function(res) {
                console.log(res);
                if (res == '{"status":200}') {

                  layer.msg("更改职务成功", {
                    icon: 1
                  });

                } else if(res == '{"vice-chairman":403}') {
                  layer.msg("副会长只能有两名", {
                    icon: 5
                  });

                  setTimeout(function() {
                    //alert(f_title);
                  obj.update({
                    'f_title': f_title
                  }); //修改成功修改表格数据不进行跳转 

                  }, 1000);

                  form.render();
                }else if(res == '{"essence": 403}') {
                  layer.msg("精英只能有三名", {
                    icon: 5
                  });

                  setTimeout(function() {
                    //alert(f_title);
                  obj.update({
                    'f_title': f_title
                  }); //修改成功修改表格数据不进行跳转 

                  }, 1000);
                }else{
                  layer.msg("更改失败", {
                    icon: 5
                  });

                  setTimeout(function() {
                    //alert(f_title);
                  obj.update({
                    'f_title': f_title
                  }); //修改成功修改表格数据不进行跳转 

                  }, 1000);
                }
              }
            });

          });

          table.on('tool(member)', function(obj) {
            memberData = obj.data;
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的 DOM 对象（如果有的话）
            if (layEvent === 'del') { //删除
              layer.confirm('真的删除行么', function(index) {
                $.ajax({
                  url: "{{url('/del/guild/member')}}",
                  type: 'get',
                  datatype: 'json',
                  data: {
                    'f_role_id': memberData.f_role_id,
                    'f_guild_id': guildID
                  }, //向服务端发送删除的id
                  success: function(res) {
                
                    if (res == '{"status":200}') {
                      obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                      layer.close(index);
                 
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
            }
          });
        } else if (layEvent === 'edit') { //编辑

          layer.open({
            //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
            type: 1,
            title: "编辑公告内容",
            area: ['620px', '330px'],
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
       
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/update/guild')}}",
            type: 'post',
            data: {
              f_guild_id: data.f_guild_id,
              f_announcement: massage.field.f_announcement,
            },
            success: function(msg) {
          
              if (msg == '{"status":200}') {
                layer.closeAll('loading');
                layer.load(2);
                layer.msg("修改成功", {
                  icon: 6
                });
                setTimeout(function() {

                  obj.update({
                    f_announcement: massage.field.f_announcement,
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
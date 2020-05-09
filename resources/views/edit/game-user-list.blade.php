<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>用户列表</title>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>

<body>

  <table id="demo" lay-filter="test"></table>

<!--   <script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="detail">查看广告</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
  </script> -->

  

  <script src="/layuiadmin/layui/layui.js"></script>
  <script src="/layuiadmin/layui/jquery3.2.js"></script>
  <script>

    layui.use(['table','util'], function() {
      var table = layui.table;
      var util = layui.util;

      //第一个实例
      table.render({
        elem: '#demo',
        height: 600,
        url: "{{url('/edit/game-user-list')}}" //数据接口
          ,
        page: true //开启分页
          ,
        cols: [
          [ //表头
            {
              field: 'f_role_id',
              title: '游戏ID',
              width: 100,
              align: 'center',
              sort: true
            }, {
              field: 'f_username',
              title: '用户帐号',
              align: 'center',
              width: 180
            }, {
              field: 'f_nick_name',
              title: '角色名',
              align: 'center',
              width: 150,
            }, {
              field: 'f_level',
              title: '等级',
              width: 80,
              align: 'center',
              sort: true
            }, {
              field: 'f_mobile',
              title: '手机号',
              width: 200,
              align: 'center',
              sort: true
            }, 
            {
              field: 'f_money',
              title: '金币余额',
              width: 120,
              align: 'center',
              sort: true
            }, {
              field: 'f_savemoney',
              title: '钱庄余额',
              align: 'center',
              width: 120
            }, {
              field: 'f_xima',
              title: '金豆余额',
              align: 'center',
              width: 120,
              sort: true
            },  {
              field: 'f_game_time',
              title: '总游戏时长',
              width: 140,
              align: 'center',
              sort: true
            }, {
              field: 'updated_at',
              title: '总充值金额',
              align: 'center',
              width: 140,
              sort: true
            }, {
              field: 'f_guild_donate',
              title: '公会捐献金额',
              width: 140,
              align: 'center',
              sort: true
            }, {
              field: 'f_inserttime',
              title: '注册时间',
              width: 180,
              align: 'center',
              sort: true
            }, {
              field: 'f_last_login_time',
              title: '上次登录时间',
              align: 'center',
              templet:function(d){return util.toDateString(d.f_last_login_time*1000, "yyyy-MM-dd HH:mm:ss");},
              width: 180,
              sort: true
            },
            {
              field: 'f_last_offline_time',
              title: '上次离线时间',
              width: 180,
              align: 'center',
              templet:function(d){return util.toDateString(d.f_last_offline_time*1000, "yyyy-MM-dd HH:mm:ss");},
              sort: true
            },
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

        if (layEvent === 'detail') { //查看
          var img = '<img src="' + window.location.protocol + "//" + window.location.host + '/' + data.img_url + '"' + "/>'";
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
          layer.confirm('真的删除这个玩家信息么', function(index) {
            $.ajax({
              url: "{{url('/del/advert')}}",
              type: 'get',
              data: {
                'id': data.id
              }, //向服务端发送删除的id
              success: function(suc) {
                if (suc.status == 200) {
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
          //do something

          //同步更新缓存对应的值
          obj.update({
            username: '123',
            title: 'xxx'
          });
        } else if (layEvent === 'LAYTABLE_TIPS') {
          layer.alert('Hi，头部工具栏扩展的右侧图标。');
        }
      });

    });
  </script>
</body>

</html>
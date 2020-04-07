<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>创建公会</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="{{ asset('layuiadmin/layui/css/layui.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('layuiadmin/style/admin.css') }}" media="all">
</head>

<body>

  <style>
    .layui-upload-img {
      width: 92px;
      height: 92px;
      margin: 0 10px 10px 0;
    }
  </style>

  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">创建广告</div>
          <div class="layui-card-body" pad15>

            <div class="layui-form" lay-filter="">
              <div class="layui-card-body">
                <div class="layui-upload">
                  <button type="button" class="layui-btn" id="test-upload-normal">上传图片</button>
                  <div class="layui-upload-list">
                    <img class="layui-upload-img" id="test-upload-normal-img" alt="图片预览">

                  </div>
                </div>

              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline">
                  <input type="text" name="sort" value="" lay-verify="sort" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="setmyinfo">确认创建</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="/layuiadmin/layui/layui.js"></script>
  <script>
    layui.config({
      base: '/layuiadmin/' //静态资源所在路径
    }).extend({
      index: 'lib/index' //主入口模块
    }).use(['index', 'upload'], function() {
      var $ = layui.jquery,
        upload = layui.upload;

      //普通图片上传
      var uploadInst = upload.render({
        elem: '#test-upload-normal',
        url: '/upload/',
        before: function(obj) {
          //预读本地文件示例，不支持ie8
          obj.preview(function(index, file, result) {
            $('#test-upload-normal-img').attr('src', result); //图片链接（base64）
          });
        },
        done: function(res) {
          //如果上传失败
          if (res.code > 0) {
            return layer.msg('上传失败');
          }
          //上传成功
        },
        error: function() {
          //演示失败状态，并实现重传
          var demoText = $('#test-upload-demoText');
          demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
          demoText.find('.demo-reload').on('click', function() {
            uploadInst.upload();
          });
        }
      });



    });
  </script>
</body>

</html>
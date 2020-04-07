<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>后台管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/game/Public/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/game/Public/layuiadmin/style/admin.css" media="all">
</head>
<body class="layui-layout-body">
  
  <div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <!-- 头部区域 -->
        <ul class="layui-nav layui-layout-left">
          <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
              <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
          </li>
          <!--<li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="http://www.layui.com/admin/" target="_blank" title="前台">
              <i class="layui-icon layui-icon-website"></i>
            </a>
          </li>-->
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" layadmin-event="refresh" title="刷新">
              <i class="layui-icon layui-icon-refresh-3"></i>
            </a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="template/search.html?keywords="> 
          </li>
        </ul>
        <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
          
          <!--<li class="layui-nav-item" lay-unselect>
            <a lay-href="app/message/index.html" layadmin-event="message" lay-text="消息中心">
              <i class="layui-icon layui-icon-notice"></i>  
            
              <span class="layui-badge-dot"></span>
            </a>
          </li>-->
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="theme">
              <i class="layui-icon layui-icon-theme"></i>
            </a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="note">
              <i class="layui-icon layui-icon-note"></i>
            </a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="fullscreen">
              <i class="layui-icon layui-icon-screen-full"></i>
            </a>
          </li>
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;">
              <cite><?php echo session('admin_user');?></cite>
            </a>
            <dl class="layui-nav-child">
              <dd><a lay-href="">基本资料</a></dd>
              <dd><a lay-href="<?php echo U('Houtai/c_mima');?>">修改密码</a></dd>
              <hr>
              <dd  style="text-align: center;"><a href="<?php echo U('Houtai/logout');?>">退出</a></dd>
            </dl>
          </li>
          
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="about"><i class="layui-icon layui-icon-more-vertical"></i></a>
          </li>
          <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect>
            <a href="javascript:;" layadmin-event="more"><i class="layui-icon layui-icon-more-vertical"></i></a>
          </li>
        </ul>
      </div>
      
      <!-- 侧边菜单 -->
      <div class="layui-side layui-side-menu">
        <div class="layui-side-scroll">
          <div class="layui-logo" lay-href="home/console.html">
            <span>管理后台</span>
          </div>
          
          <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item layui-nav-itemed">
              <a href="javascript:;" lay-tips="主页" lay-direction="2">
                <i class="layui-icon layui-icon-home"></i>
                <cite>主页</cite>
              </a>
              <dl class="layui-nav-child">
                <dd data-name="console" class="layui-this">
                  <a lay-href="/game/index.php/Home/Index/console">系统总览</a>
                </dd>
              </dl>
            </li>
            <li data-name="component" class="layui-nav-item layui-nav-itemed">
              <a href="javascript:;" lay-tips="组件" lay-direction="2">
                <i class="layui-icon layui-icon-component"></i>
                <cite>账号管理</cite>
              </a>
              <dl class="layui-nav-child">
                 <dd data-name="button">
                  <a lay-href="<?php echo U('Houtai/user_list');?>">用户列表</a>
                </dd> 
                <dd><a lay-href="<?php echo U('Houtai/zhcz');?>">账号操作</a></dd>
                
              </dl>
            </li>
            <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a href="javascript:;" lay-tips="应用" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>游玩记录</cite>
              </a>
              <dl class="layui-nav-child">               
                <dd data-name="content">
                  <a lay-href="<?php echo U('Houtai/ywjl');?>">客户查询</a>
                </dd>
              </dl>
            </li>
            <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a lay-href="<?php echo U('Houtai/tongji');?>" lay-tips="" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>统计</cite>
              </a>
              <!-- <dl class="layui-nav-child">        
               <dd><a lay-href="<?php echo U('Houtai/zxgl');?>">在线管理</a></dd>
               </dl> -->
			   <dl class="layui-nav-child">
			    <dd><a lay-href="<?php echo U('Houtai/zhangdan');?>">账单</a></dd>
			    </dl>
            </li>
           <li data-name="set" class="layui-nav-item">
              <a href="javascript:;" lay-tips="设置" lay-direction="2">
                <i class="layui-icon layui-icon-set"></i>
                <cite>游戏管理</cite>
              </a>
              <dl class="layui-nav-child">
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/pdk');?>">跑得快管理</a>                
                </dd>
               <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/qznn');?>">抢庄牛牛管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/brnn');?>">百人牛牛管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/yqsby');?>">摇钱树捕鱼管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/nmwby');?>">牛魔王捕鱼管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/fpdmg');?>">翻牌大满贯管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/sbao');?>">骰宝管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/binguo');?>">转盘管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/xiyou');?>">太上老君管理</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Game/bjl');?>">百家乐管理</a>                
                </dd>
              </dl>
            </li>
            <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a lay-tips="" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>活动配置</cite>
              </a>
              <dl class="layui-nav-child">
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Huodong/hyr_list');?>">会员日活动</a>                
                </dd>
               <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Huodong/jyj_list');?>">救援金活动</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Huodong/phb_list');?>">排行榜活动</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Huodong/tousu_list');?>">投诉建议</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Huodong/bisai_list');?>">比赛活动</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="<?php echo U('Huodong/ewai_list');?>">额外奖励</a>                
                </dd>
              </dl>
            </li>
             <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a lay-href="<?php echo U('Houtai/khls');?>" lay-tips="" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>客户流失</cite>
              </a>

            </li>
             <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a lay-href="" lay-tips="" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>客服管理</cite>
              </a>
              <dl class="layui-nav-child">
                <dd class="layui-nav-itemed">
                  <a href="javascript:;">创建账号</a>                
                </dd>
               <dd class="layui-nav-itemed">
                  <a href="javascript:;">权限管理</a>                
               </dd>
              </dl>
            </li>
			<li data-name="app" class="layui-nav-item layui-nav-itemed">
			  <a lay-href="" lay-tips="" lay-direction="2">
			    <i class="layui-icon layui-icon-app"></i>
			    <cite>邮件公告</cite>
			  </a>
			  <dl class="layui-nav-child">
			    <dd class="layui-nav-itemed">
			      <a lay-href="<?php echo U('Houtai/youjian');?>">邮件</a>                
			    </dd>
			   <!-- <dd class="layui-nav-itemed">
			      <a href="javascript:;">权限管理</a>                
			   </dd> -->
			  </dl>
			</li>
          </ul>
        </div>
      </div>

      <!-- 页面标签 -->
      <div class="layadmin-pagetabs" id="LAY_app_tabs">
        <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-down">
          <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
            <li class="layui-nav-item" lay-unselect>
              <a href="javascript:;"></a>
              <dl class="layui-nav-child layui-anim-fadein">
                <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
          <ul class="layui-tab-title" id="LAY_app_tabsheader">
            <li lay-id="home/console.html" lay-attr="home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
          </ul>
        </div>
      </div>
      
      
      <!-- 主体内容 -->
      <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show">
          <iframe src="/game/index.php/Home/Index/console" frameborder="0" class="layadmin-iframe"></iframe>
        </div>
      </div>
      
      <!-- 辅助元素，一般用于移动设备下遮罩 -->
      <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
  </div>

  <script src="/game/Public/layuiadmin/layui/layui.js"></script>
   <script>
  layui.config({
    base: '/game/Public/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use('index');
  </script>
</body>
</html>
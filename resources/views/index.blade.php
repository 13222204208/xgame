

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>控制台</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="{{ asset('layuiadmin/layui/css/layui.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('layuiadmin/style/admin.css') }}" media="all">
  

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
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="http://www.layui.com/admin/" target="_blank" title="前台">
              <i class="layui-icon layui-icon-website"></i>
            </a>
          </li>
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
          
          <li class="layui-nav-item" lay-unselect>
            <a lay-href="app/message/index.html" layadmin-event="message" lay-text="消息中心">
              <i class="layui-icon layui-icon-notice"></i>  
              
              <!-- 如果有新消息，则显示小圆点 -->
              <span class="layui-badge-dot"></span>
            </a>
          </li>
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
            <cite>{{$name}}</cite>
            </a>
            <dl class="layui-nav-child">
              <dd><a lay-href="{{ url('set/user/info') }}">基本资料</a></dd>
              <dd><a lay-href="set/user/password.html">修改密码</a></dd>
              <hr>
              <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
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
        <div class="layui-logo" lay-href="{{ url('/console') }}">
            <span>后台管理</span>
          </div>
          
          <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item layui-nav-itemed">
              <a href="javascript:;" lay-tips="主页" lay-direction="2">
                <i class="layui-icon layui-icon-home"></i>
                <cite>主页</cite>
              </a>
              <dl class="layui-nav-child">
                <dd data-name="console" class="layui-this">
                  <a lay-href="{{ url('/console')}}">控制台</a>
                </dd>
              </dl>
            </li>

            <li data-name="user" class="layui-nav-item">
              <a href="javascript:;" lay-tips="公会" lay-direction="2">
                <i class="layui-icon layui-icon-user"></i>
                <cite>公会</cite>
              </a>
              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="{{ url('/create/guild')}}">创建公会</a>
                </dd>
                <dd>
                  <a lay-href="{{ url('/edit/guild-info') }}">管理公会</a>
                </dd>
           
              </dl>
            </li>

            <li data-name="user" class="layui-nav-item">
              <a href="javascript:;" lay-href="{{ url('/create/turntable') }}" lay-tips="转盘" lay-direction="2">
                <i class="layui-icon layui-icon-auz"></i>
                <cite>转盘</cite>
              </a>
            </li>

            <li data-name="component" class="layui-nav-item">
              <a href="javascript:;" lay-tips="广告管理" lay-direction="2">
                <i class="layui-icon layui-icon-component"></i>
                <cite>广告管理</cite>
              </a>
              <dl class="layui-nav-child">
              
                <dd data-name="nav">
                  <a lay-href="{{ url('/create/advert') }}">创建广告</a>
                </dd>
                <dd data-name="tabs">
                  <a lay-href="component/tabs/index.html">编辑广告</a>
                </dd>
              
            </li>

            <li data-name="user" class="layui-nav-item">
              <a href="javascript:;" lay-href="{{ url('/create/horse') }}" lay-tips="跑马灯" lay-direction="2">
                <i class="layui-icon layui-icon-auz"></i>
                <cite>跑马灯</cite>
              </a>
            </li>

            <li data-name="component" class="layui-nav-item">
              <a href="javascript:;" lay-tips="账号管理" lay-direction="2">
                <i class="layui-icon layui-icon-component"></i>
                <cite>账号管理</cite>
              </a>
              <dl class="layui-nav-child">
              
                <dd data-name="nav">
                  <a lay-href="component/nav/index.html">用户列表</a>
                </dd>
                <dd data-name="tabs">
                  <a lay-href="component/tabs/index.html">账号操作</a>
                </dd>
              
            </li>

            <li data-name="app" class="layui-nav-item">
              <a href="javascript:;" lay-tips="游玩记录" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>游玩记录</cite>
              </a>
              <dl class="layui-nav-child">
                
               
                <dd>
                  <a lay-href="app/message/index.html">客户查询</a>
                </dd>
              
              </dl>
            </li>

            <li data-name="app" class="layui-nav-item">
              <a href="javascript:;" lay-tips="统计" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>统计</cite>
              </a>
              <dl class="layui-nav-child">
                
               
                <dd>
                  <a lay-href="app/message/index.html">账单</a>
                </dd>
              
              </dl>
            </li>
            <li data-name="senior" class="layui-nav-item">
              <a href="javascript:;" lay-tips="游戏管理" lay-direction="2">
                <i class="layui-icon layui-icon-senior"></i>
                <cite>游戏管理</cite>
              </a>
              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">跑的快管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">抢庄牛牛管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">百人牛牛管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">摇钱树捕鱼管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">牛魔王捕鱼管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">翻牌大满贯管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">骰宝管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">转盘管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">太上老君管理</a>  
                </dd>
              </dl>

              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="">百家乐管理</a>  
                </dd>
              </dl>
            </li>

            <li data-name="app" class="layui-nav-item layui-nav-itemed">
              <a lay-tips="" lay-tips="活动配置"  lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>活动配置</cite>
              </a>
              <dl class="layui-nav-child">
                <dd class="layui-nav-itemed">
                  <a lay-href="/game/index.php/Home/Huodong/hyr_list.html">会员日活动</a>                
                </dd>
               <dd class="layui-nav-itemed">
                  <a lay-href="/game/index.php/Home/Huodong/jyj_list.html">救援金活动</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="/game/index.php/Home/Huodong/phb_list.html">排行榜活动</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="/game/index.php/Home/Huodong/tousu_list.html">投诉建议</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="/game/index.php/Home/Huodong/bisai_list.html">比赛活动</a>                
                </dd>
                <dd class="layui-nav-itemed">
                  <a lay-href="/game/index.php/Home/Huodong/ewai_list.html">额外奖励</a>                
                </dd>
              </dl>
            </li>


            <li data-name="user" class="layui-nav-item">
              <a href="javascript:;" lay-href="http://www.layui.com/admin/#get" lay-tips="客户流失" lay-direction="2">
                <i class="layui-icon layui-icon-auz"></i>
                <cite>客户流失</cite>
              </a>
            </li>

            <li data-name="app" class="layui-nav-item">
              <a href="javascript:;" lay-tips="客服管理" lay-direction="2">
                <i class="layui-icon layui-icon-app"></i>
                <cite>客服管理</cite>
              </a>
              <dl class="layui-nav-child">
                
                <dd>
                  <a lay-href="{{ url('/set/user/newuser')}}">创建帐号</a>
                </dd>
                <dd data-name="workorder">
                  <a lay-href="app/workorder/list.html">权限管理</a>
                </dd>
              </dl>
            </li>

            <li data-name="set" class="layui-nav-item">
              <a href="javascript:;" lay-tips="设置" lay-direction="2">
                <i class="layui-icon layui-icon-set"></i>
                <cite>设置</cite>
              </a>
              <dl class="layui-nav-child">
                <dd class="layui-nav-itemed">
                  <a href="javascript:;">系统设置</a>
                  <dl class="layui-nav-child">
                    <dd><a lay-href="set/system/website.html">网站设置</a></dd>
                    <dd><a lay-href="set/system/email.html">邮件服务</a></dd>
                  </dl>
                </dd>
                <dd class="layui-nav-itemed">
                  <a href="javascript:;">我的设置</a>
                  <dl class="layui-nav-child">
                    <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                    <dd><a lay-href="set/user/password.html">修改密码</a></dd>
                  </dl>
                </dd>
              </dl>
            </li>
            <li data-name="get" class="layui-nav-item">
              <a href="javascript:;" lay-href="http://www.layui.com/admin/#get" lay-tips="邮件公告" lay-direction="2">
                <i class="layui-icon layui-icon-auz"></i>
                <cite>邮件公告</cite>
              </a>
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
          <li lay-id="{{ url('console') }}" lay-attr="{{ url('console') }}" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
          </ul>
        </div>
      </div>
      
      
      <!-- 主体内容 -->
      <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show">
          <iframe src="{{ url('console') }}" frameborder="0" class="layadmin-iframe"></iframe>
        </div>
      </div>
      
      <!-- 辅助元素，一般用于移动设备下遮罩 -->
      <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
  </div>

  <script src="../layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: '../layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use('index');
  </script>
</body>
</html>



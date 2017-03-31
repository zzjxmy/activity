<!-- aside -->
<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user -->
            <div class="clearfix hidden-xs text-center hide show" id="aside-user">
                <div class="dropdown wrapper">
                    <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="../img/a0.jpg" class="img-full" alt="...">
                </span>
                    </a>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt">张志坚</strong>
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block">系统管理员</span>
                </span>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                        <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                            <span class="arrow top hidden-folded arrow-info"></span>
                            <div>
                                <p>权限获取比例</p>
                            </div>
                            <div class="text-center-folded">
                                <span class="pull-right pull-none-folded">60%</span>
                                <span class="hidden-folded">Proportion</span>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>个人设置</a>
                        </li>
                        <li>
                            <a href="page_profile.html">修改密码</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/logout">注销</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </div>
                <div class="line dk hidden-folded"></div>
            </div>
            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Components</span>
                    </li>
                    <li class="active">
                        <a href class="auto">
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <b class="badge bg-info pull-right">5</b>
                            <i class="glyphicon glyphicon-th"></i>
                            <span>活动管理</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>活动管理</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('activity/create')}}">
                                    <span>新建活动</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('activity')}}">
                                    <span>活动列表</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_fullwidth.html">
                                    <span>短信落地页</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_fullwidth.html">
                                    <span>访问记录</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_boxed.html">
                                    <span>活动组件</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href class="auto">
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <b class="badge bg-info pull-right">2</b>
                            <i class="glyphicon glyphicon-briefcase icon"></i>
                            <span>收入查看</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>收入查看</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>收入图表</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>收入列表</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href class="auto">
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <b class="badge bg-info pull-right">3</b>
                            <i class=" icon-users icon"></i>
                            <span>用户管理</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>用户管理</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>新增用户</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>用户列表</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>操作记录</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href class="auto">
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <b class="badge bg-info pull-right">2</b>
                            <i class="icon-doc icon"></i>
                            <span>回调记录</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>回调记录</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>请求查看</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>响应查看</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href class="auto">
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <b class="badge bg-info pull-right">4</b>
                            <i class=" icon-user-following icon"></i>
                            <span>权限管理</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li>
                                <a href="{{url('purview')}}">
                                    <span>角色列表</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>新增角色</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>权限列表</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui_button.html">
                                    <span>新增权限</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="line dk hidden-folded"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Your Stuff</span>
                    </li>
                    <li>
                        <a href="page_profile.html">
                            <i class="icon-user icon text-success-lter"></i>
                            <span>我的信息</span>
                        </a>
                    </li>
                    <li>
                        <a href="page_profile.html">
                            <i class="glyphicon glyphicon-edit text-success-lter"></i>
                            <span>修改密码</span>
                        </a>
                    </li>
                    <li>
                        <a href="page_profile.html">
                            <i class="icon-key text-success-lter"></i>
                            <b class="badge bg-success pull-right">30%</b>
                            <span>我的权限</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>
<!-- / aside -->
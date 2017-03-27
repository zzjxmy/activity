@extends('layouts.head')
@section('content')
<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
app.settings.asideFolded = false;
app.settings.asideDock = false;
">
            <!-- main -->
            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <h1 class="m-n font-thin h3 text-black">Dashboard</h1>
                            <small class="text-muted">Welcome to yupaopao activity application</small>
                        </div>
                    </div>
                </div>
                <!-- / main header -->
                <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                    <!-- stats -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row row-sm text-center">
                                <div class="col-xs-6">
                                    <div class="panel padder-v item">
                                        <div class="h1 text-info font-thin h1">$521.00</div>
                                        <span class="text-muted text-xs">当天</span>
                                        <div class="top text-right w-full">
                                            <i class="fa fa-caret-down text-warning m-r-sm"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="panel padder-v item bg-success">
                                        <div class="h1 text-white font-thin h1">$521.00</div>
                                        <span class="text-muted text-xs">7天收入</span>
                                        <div class="top text-right w-full">
                                            <i class="fa fa-caret-down text-warning m-r-sm"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="panel padder-v item bg-info">
                                        <div class="h1 text-white font-thin h1">$521.00</div>
                                        <span class="text-muted text-xs">30天收入</span>
                                        <div class="top text-right w-full">
                                            <i class="fa fa-caret-down text-warning m-r-sm"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="panel padder-v item">
                                        <div class="font-thin h1">$129.00</div>
                                        <span class="text-muted text-xs">一年收入</span>
                                        <div class="top text-right w-full">
                                            <i class="fa fa-caret-down text-warning m-l-sm m-r-sm"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 m-b-md">
                                    <div class="r bg-light dker item hbox no-border">
                                        <div class="col w-xs v-middle hidden-md">
                                            <div ng-init="d3_3=[60,40]" ui-jq="sparkline" ui-options="[60,40], {type:'pie', height:40, sliceColors:['#fad733','#fff']}" class="sparkline inline"></div>
                                        </div>
                                        <div class="col dk padder-v r-r">
                                            <div class="text-primary-dk font-thin h1"><span>$12,670</span></div>
                                            <span class="text-muted text-xs">总收入</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="panel wrapper">
                                <h4 class="font-thin m-t-none m-b text-muted">近三十天分类收入折线图</h4>
                                <div ui-jq="plot" ui-refresh="showSpline" ui-options="
          [
            { data: [ [0,7],[1,6.5],[2,12.5],[3,7],[4,9],[5,6],[6,11],[7,6.5],[8,8],[9,7] ], label:'订单', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } },
            { data: [ [0,4],[1,4.4],[2,7],[3,4.5],[4,3],[5,3.5],[6,6],[7,3],[8,4],[9,3] ], label:'活动页投票', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } },
            { data: [ [0,5],[1,4.5],[2,8],[3,4.5],[4,3],[5,3.5],[6,6],[7,3],[8,4],[9,3] ], label:'直播间打赏', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } },
            { data: [ [0,6],[1,4.6],[2,9],[3,4.5],[4,3],[5,3.5],[6,6],[7,3],[8,4],[9,3] ], label:'动态打赏', points: { show: false, radius: 1}, splines: { show: false, tension: 0.4, lineWidth: 1, fill: 0.8 } }
          ],
          {
            colors: ['#23b7e5', '#7266ba','#fad733','#27c24c'],
            series: { shadowSize: 1 },
            xaxis:{ font: { color: '#a1a7ac' } },
            yaxis:{ font: { color: '#a1a7ac' }, max:20 },
            grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#dce5ec' },
            tooltip: true,
            tooltipOpts: { content: '￥%y.2',  defaultTheme: false, shifts: { x: 10, y: -25 } }
          }
        " style="height:246px" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / stats -->

                    <!-- service -->
                    <div class="panel hbox hbox-auto-xs no-border">
                        <div class="col wrapper">
                            <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
                            <h4 class="font-thin m-t-none m-b-none text-primary-lt">近三个月收入折线图</h4>
                            <span class="m-b block text-sm text-muted"></span>
                            <div ui-jq="plot" ui-options="
        [
          { data: [ [1,5.5],[2,6.5],[3,7],[4,8],[5,7.5],[6,7],[7,6.8],[8,7],[9,7.2],[10,7],[11,6.8],[12,7],[13,2.5],[14,3.5],[15,7],[16,7],[17,6],[18,7],[19,6.8],[20,5],[21,7],[22,8],[23,6.8],[24,7] ], lines: { show: true, lineWidth: 1, fill:true, fillColor: { colors: [{opacity: 0.2}, {opacity: 0.8}] } } }
        ],
        {
          colors: ['#e8eff0'],
          series: { shadowSize: 3 },
          xaxis:{ show:false },
          yaxis:{ font: { color: '#a1a7ac' } },
          grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#dce5ec' },
          tooltip: true,
          tooltipOpts: { content: '%s of %x.1 is %y.4',  defaultTheme: false, shifts: { x: 10, y: -25 } }
        }
      " style="height:240px" >
                            </div>
                            <span class="m-b block text-sm text-muted"></span>
                        </div>
                        <div class="col wrapper-lg w-lg bg-light dk r-r">
                            <h4 class="font-thin m-t-none m-b">金额总收入占比</h4>
                            <div class="">
                                <div class="">
                                    <span class="pull-right text-info">35%</span>
                                    <span>订单</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-info" data-toggle="tooltip" data-original-title="35%" style="width: 35%"></div>
                                </div>
                                <div class="">
                                    <span class="pull-right text-primary">60%</span>
                                    <span>活动页投票</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-primary" data-toggle="tooltip" data-original-title="60%" style="width: 60%"></div>
                                </div>
                                <div class="">
                                    <span class="pull-right text-warning">25%</span>
                                    <span>直播间打赏</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-warning" data-toggle="tooltip" data-original-title="23%" style="width: 25%"></div>
                                </div>
                                <div class="">
                                    <span class="pull-right text-success">25%</span>
                                    <span>动态打赏</span>
                                </div>
                                <div class="progress progress-xs m-t-sm bg-white">
                                    <div class="progress-bar bg-success" data-toggle="tooltip" data-original-title="23%" style="width: 25%"></div>
                                </div>
                            </div>
                            <p class="text-muted">总收入分类占比</p>
                        </div>
                    </div>
                    <!-- / service -->

                    <!-- tasks -->
                    <div class="panel wrapper">
                        <div class="row">
                            <div class="col-md-6 b-r b-light no-border-xs">
                                <a href class="text-muted pull-right text-lg"><i class="icon-arrow-right"></i></a>
                                <h4 class="font-thin m-t-none m-b-md text-muted">最近收入</h4>
                                <div class=" m-b">
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 19:30</span>
                                        <a href>活动：Hello word&nbsp;&nbsp;&nbsp;&nbsp;类型：下单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额：$100.00</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 19:30</span>
                                        <a href>活动：Hello word&nbsp;&nbsp;&nbsp;&nbsp;类型：下单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额：$100.00</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 19:30</span>
                                        <a href>活动：Hello word&nbsp;&nbsp;&nbsp;&nbsp;类型：下单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额：$100.00</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 19:30</span>
                                        <a href>活动：Hello word&nbsp;&nbsp;&nbsp;&nbsp;类型：下单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额：$100.00</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 b-light no-border-xs">
                                <div class=" m-b">
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 19:30</span>
                                        <a href>活动：Hello word&nbsp;&nbsp;&nbsp;&nbsp;类型：下单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金额：$100.00</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 12:30</span>
                                        <a href>Fishing Time</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 10:30</span>
                                        <a href>Kick-off meeting</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 07:30</span>
                                        <a href>Morning running</a>
                                    </div>
                                    <div class="m-b">
                                        <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> 07:30</span>
                                        <a href>Morning running</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / tasks -->
                </div>
            </div>
            <!-- / main -->
            <!-- right col -->
            <div class="col w-md bg-white-only b-l bg-auto no-border-xs">

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab-1">
                        <div class="wrapper-md">
                            <div class="m-b-sm text-md">登录历史</div>
                            <ul class="list-group no-bg no-borders pull-in">
                                <li class="list-group-item">
                                    <a herf class="pull-left thumb-sm avatar m-r">
                                        <img src="../img/a4.jpg" alt="..." class="img-circle">
                                        <i class="on b-white bottom"></i>
                                    </a>
                                    <div class="clear">
                                        <div>郭超</div>
                                        <small class="text-muted">Time：2017-03-27-14:20</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a herf class="pull-left thumb-sm avatar m-r">
                                        <img src="../img/a5.jpg" alt="..." class="img-circle">
                                        <i class="on b-white bottom"></i>
                                    </a>
                                    <div class="clear">
                                        <div><a href>Mogen Polish</a></div>
                                        <small class="text-muted">Writter, Mag Editor</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a herf class="pull-left thumb-sm avatar m-r">
                                        <img src="../img/a6.jpg" alt="..." class="img-circle">
                                        <i class="busy b-white bottom"></i>
                                    </a>
                                    <div class="clear">
                                        <div><a href>Joge Lucky</a></div>
                                        <small class="text-muted">Art director, Movie Cut</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a herf class="pull-left thumb-sm avatar m-r">
                                        <img src="../img/a7.jpg" alt="..." class="img-circle">
                                        <i class="away b-white bottom"></i>
                                    </a>
                                    <div class="clear">
                                        <div><a href>Folisise Chosielie</a></div>
                                        <small class="text-muted">Musician, Player</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a herf class="pull-left thumb-sm avatar m-r">
                                        <img src="../img/a8.jpg" alt="..." class="img-circle">
                                        <i class="away b-white bottom"></i>
                                    </a>
                                    <div class="clear">
                                        <div><a href>Aron Gonzalez</a></div>
                                        <small class="text-muted">Designer</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href class="btn btn-sm btn-primary padder-md m-b">查看所有操作历史</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="padder-md">
                    <!-- streamline -->
                    <div class="m-b text-md">最近管理员操作记录</div>
                    <div class="streamline b-l m-b">
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">5 minutes ago</div>
                                <p><a href class="text-info">郭超</a> commented your post.</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">11:30</div>
                                <p>Join comference</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">10:30</div>
                                <p>Call to customer <a href class="text-info">Jacob</a> and discuss the detail.</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">Wed, 25 Mar</div>
                                <p>Finished task <a href class="text-info">Testing</a>.</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">Thu, 10 Mar</div>
                                <p>Trip to the moon</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">Sat, 5 Mar</div>
                                <p>Prepare for presentation</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">Thu, 10 Mar</div>
                                <p>Trip to the moon</p>
                            </div>
                        </div>
                        <div class="sl-item b-success b-l">
                            <div class="m-l">
                                <div class="text-muted">Thu, 10 Mar</div>
                                <p>Trip to the moon</p>
                            </div>
                        </div>
                    </div>
                    <!-- / streamline -->
                </div>
            </div>
            <!-- / right col -->
        </div>
    </div>
</div>
<!-- /content -->
@endsection


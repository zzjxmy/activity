@extends('layouts.head')
@section('content')
<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">


        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">活动新增</h1>
        </div>
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    内容填写
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="get">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">选择活动</label>
                            <div class="col-sm-10">
                                <select name="account" class="form-control m-b">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动时间</label>
                            <div class="col-sm-10" ng-controller="DatepickerDemoCtrl">
                                <div class="input-group w-md">
                                    <input id="from_date" ui-jq="daterangepicker" ui-options="{
                                    format: 'YYYY/MM/DD',
                                    startDate: '{{date('Y-m-d')}}',
                                    endDate: '{{date('Y-m-d',strtotime('+20 day'))}}'
                                  }" class="form-control w-md">
                                    <span class="input-group-btn">
                <button type="button" class="btn btn-default" onclick="$('#from_date').click()"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">需要审核</label>
                            <div class="col-sm-10">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r">
                                    <input type="checkbox" checked="checked">
                                    <i></i>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">组件选择</label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label class="i-checks">
                                        <input type="checkbox" value="">
                                        <i></i>
                                        订单
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="i-checks">
                                        <input type="checkbox" value="">
                                        <i></i>
                                        活动页投票
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="i-checks">
                                        <input type="checkbox" value="">
                                        <i></i>
                                        直播间打赏
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="i-checks">
                                        <input type="checkbox" value="">
                                        <i></i>
                                        动态打赏
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">订单组件配置</label>
                            <div class="col-sm-10">
                                <div class="input-group w-md m-b">
                                    <input id="from_date_order" ui-jq="daterangepicker" ui-options="{
                                    format: 'YYYY/MM/DD',
                                    startDate: '{{date('Y-m-d')}}',
                                    endDate: '{{date('Y-m-d',strtotime('+20 day'))}}'
                                  }" class="form-control w-md" placeholder="组件时间，默认取活动时间">
                                    <span class="input-group-btn">
                <button type="button" class="btn btn-default" onclick="$('#from_date_order').click()"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
                                </div>
                                <div>
                                    <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input ui-jq="TouchSpin" type="text" value="10" class="form-control" data-min="0" data-max="20" data-verticalbuttons="true" data-verticalupclass="fa fa-caret-up" data-verticaldownclass="fa fa-caret-down" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="fa fa-caret-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="fa fa-caret-down"></i></button></span></div>
                                </div>
                                <input class="form-control input-sm" type="text" placeholder=".input-sm">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动页投票组件配置</label>
                            <div class="col-sm-10">
                                <input class="form-control input-lg m-b" type="text" placeholder=".input-lg">
                                <input class="form-control m-b" type="text" placeholder="Default input">
                                <input class="form-control input-sm" type="text" placeholder=".input-sm">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">直播间打赏组件配置</label>
                            <div class="col-sm-10">
                                <input class="form-control input-lg m-b" type="text" placeholder=".input-lg">
                                <input class="form-control m-b" type="text" placeholder="Default input">
                                <input class="form-control input-sm" type="text" placeholder=".input-sm">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">动态打赏组件配置</label>
                            <div class="col-sm-10">
                                <input class="form-control input-lg m-b" type="text" placeholder=".input-lg">
                                <input class="form-control m-b" type="text" placeholder="Default input">
                                <input class="form-control input-sm" type="text" placeholder=".input-sm">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- /content -->
@endsection
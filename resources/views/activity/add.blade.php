@extends('layouts.head')
@section('content')
<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">活动新增</h1>
        </div>
        <div class="wrapper-md" ng-controller="FormDemoCtrl" v-loading.body="loading" element-loading-text="正在提交，请稍后">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    内容填写
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{url('activity')}}" id="ActivityForm">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">选择活动</label>
                            <div class="col-sm-10">
                                <select name="activityId" class="form-control m-b">
                                    @foreach($activity as $value)
                                    <option value="{{$value['id']}}">{{$value['site_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动类型</label>
                            <div class="col-sm-10">
                                <select name="activityType" class="form-control m-b" id="activity_type">
                                    <option value="1">默认</option>
                                    <option value="2">拉新</option>
                                    <option value="3">纯展示</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动时间</label>
                            <div class="col-sm-10" ng-controller="DatepickerDemoCtrl">
                                <div class="input-group w-md">
                                    <input name="activityTime" id="from_date" ui-jq="daterangepicker" ui-config="activity_dates" class="form-control w-md" placeholder="活动开放时间">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="$('#from_date').click()">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">需要审核</label>
                            <div class="col-sm-10" style="width: 5.333333%">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r is_check">
                                    <input name="activityStatus" type="checkbox" value="1" id="is_check" checked="checked">
                                    <i></i>
                                </label>
                            </div>
                            <label class="col-sm-2 control-label" style="width: 5.333333%">需要登录</label>
                            <div class="col-sm-1" style="width: 5.333333%">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r">
                                    <input name="is_login" type="checkbox" value="1">
                                    <i></i>
                                </label>
                            </div>
                            <label class="col-sm-1 control-label" style="width: 5.333333%">用户唯一</label>
                            <div class="col-sm-1" style="width: 5.333333%">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r">
                                    <input name="user_unique" type="checkbox" value="1">
                                    <i></i>
                                </label>
                            </div>
                            <label class="col-sm-2 control-label" style="width: 5.333333%">是否测试</label>
                            <div class="col-sm-10" style="width: 5.333333%">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r">
                                    <input name="is_test" type="checkbox" value="1" id="is_test">
                                    <i></i>
                                </label>
                            </div>
                        </div>
                        <div class="form-group test_mobile" style="display: none">
                            <label class="col-sm-2 control-label">测试手机</label>
                            <div class="col-sm-10">
                                <input name="activityMobile" ui-jq="tagsinput" ui-config="" class="form-control" style="display: none;" placeholder="手机号码（只对回调和需要登录活动有效），可添加多个（可为空）">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">优惠券码</label>
                            <div class="col-sm-10">
                                <input name="activityCoupon" ui-jq="tagsinput" ui-config="" class="form-control" style="display: none;" placeholder="优惠券码，可添加多个（可为空）">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">回调函数</label>
                            <div class="col-sm-10">
                                <input name="activityCallBack" class="form-control" placeholder="数据插入成功后回调函数（可为空）--格式：\App\Http\Controller\CallBackController::callBack">
                            </div>
                        </div>
                        @include('module.module')
                        @include('module.attr-module',['fields' => []])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('module.attr-add-module')
<!-- /content -->
@endsection
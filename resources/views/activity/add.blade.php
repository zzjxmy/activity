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
                                    <input id="from_date" ui-jq="daterangepicker" ui-config="activity_date" class="form-control w-md" placeholder="活动开放时间">
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
                            <div class="col-sm-10">
                                <label class="i-switch i-switch-lg bg-info m-t-xs m-r">
                                    <input type="checkbox" checked="checked">
                                    <i></i>
                                </label>
                            </div>
                        </div>
                        @include('module.module')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /content -->
@endsection
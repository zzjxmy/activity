@extends('layouts.head')
@section('content')
<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">{{$master_title}}</h1>
        </div>
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    {{$operate_title}}
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{url('purview')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-id-1">角色名</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-id-1">显示名</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="display_name" name="display_name">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-id-1">描述</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="button" class="btn btn-default" style="margin-right: 20px;" id="form_reset">取 消</button>
                                <button type="submit" class="btn btn-primary" >保 存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /content -->
@endsection
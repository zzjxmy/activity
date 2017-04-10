@extends('layouts.head')
@section('content')
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3"><a href="{{url('/activity')}}">活动列表</a>/活动编辑</h1>
            </div>
            <div class="wrapper-md" ng-controller="FormDemoCtrl">
                <div class="panel panel-default">
                    <div class="panel-heading font-bold">
                        内容填写
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{url('activity')}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">选择活动</label>
                                <div class="col-sm-10">
                                    <select name="activityId" class="form-control m-b">
                                        @foreach($activity as $value)
                                            <option value="{{$value['id']}}" @if($value['id'] == $info['static_tmp_id']) selected @endif>
                                                {{$value['site_name']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动类型</label>
                                <div class="col-sm-10">
                                    <select name="activityType" class="form-control m-b" id="activity_type">
                                        <option value="1" @if(1 == $info['type']) selected @endif>默认</option>
                                        <option value="2" @if(2 == $info['type']) selected @endif>拉新</option>
                                        <option value="3" @if(3 == $info['type']) selected @endif>纯展示</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动时间</label>
                                <div class="col-sm-10" ng-controller="DatepickerDemoCtrl">
                                    <div class="input-group w-md">
                                        <input name="activityTime" id="activity_time" value="{{date('Y/m/d',$info['start_time'])}} - {{date('Y/m/d',$info['end_time'])}}" ui-jq="daterangepicker" ui-config="activity_dates" class="form-control w-md" placeholder="活动开放时间" required>
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
                                    <label class="i-switch i-switch-lg bg-info m-t-xs m-r is_check">
                                        <input name="activityStatus" type="checkbox" value="1" id="is_check" @if(1 == $info['status']) checked="checked" @endif >
                                        <i></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">优惠券码</label>
                                <div class="col-sm-10">
                                    <input name="activityCoupon" value="{{$info['coupon']}}" ui-jq="tagsinput" ui-config="" class="form-control" style="display: none;" placeholder="优惠券码，可添加多个">
                                </div>
                            </div>
                            @include('module.module')
                            @include('module.attr-module',['fields' => $fields])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('module.attr-add-module')
    <!-- /content -->
@endsection
@section('script')
    <script>
        var checkModule = JSON.parse('{!! $modulesName !!}');
        var modules = JSON.parse('{!! json_encode($modules) !!}');
        $(function () {
            $('#activity_time').daterangepicker({
                "startDate": "{{date('Y/m/d',$info['start_time'])}}",
                "endDate": "{{date('Y/m/d',$info['end_time'])}}"
            }, function(start, end, label) {
            });
            $('#module_check input[type=checkbox]').each(function(i,j){
                var index = checkModule.indexOf($(j).attr('name'));
                if(index >= 0){
                    var moduleName = $(j).attr('module-name');
                    var arr= new Array();
                    arr = moduleName.split('-');
                    $(j).prop('checked',true);
                    $('.'+moduleName).removeClass('hidden');
                    $('#'+moduleName+'-input' + ' input[name="'+arr[0]+'[num]"]').val(modules[index]['num']);
                    if(moduleName == 'activity-vote-module')$('#'+moduleName+'-input' + ' input[name="'+arr[0]+'[selfToken]"]').val(modules[index]['token']);
                    if(modules[index]['start_time'] > 0){
                        var start_time = new Date(modules[index]['start_time']*1000).Format('yyyy/MM/dd');
                        var end_time = new Date(modules[index]['end_time']*1000).Format('yyyy/MM/dd');
                        $('#'+moduleName+'-input' + ' input[name="'+arr[0]+'[time]"]').val(start_time+' - '+end_time);
                        $('#from_date_'+arr[0]).daterangepicker({
                            "startDate": start_time,
                            "endDate": end_time
                        }, function(start, end, label) {
                        });
                    }
                }
            });
        });
    </script>
@endsection
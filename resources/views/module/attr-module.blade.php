<div class="form-group" id="activity_attr">
    @include('module.attr-update-module',['fields' => isset($fields)?$fields:[]])
</div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-sm btn-info" id="add_attr" onclick="return false">添加自定义属性</button>
        <button type="submit" class="btn btn-sm btn-primary"
        {{--@click="onSearch('ActivityForm','{{isset($ajax_url)?$ajax_url:url('activity')}}','{{isset($redirect_url)?$redirect_url:''}}')"--}}
        {{--onclick="return false">提交</button>--}}
        >提交</button>
    </div>
</div>
<div class="line line-dashed b-b line-lg pull-in dongtai-module"></div>
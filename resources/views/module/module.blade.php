<div class="form-group">
    <label class="col-sm-2 control-label" style="padding-top: 14px;">组件选择</label>
    <div class="col-sm-10" id="module_check">
        <div class="checkbox module">
            <label class="i-checks pr-sm checkbox-inline">
                <input type="checkbox" name="likeCheck" value="like" module-name="like-module">
                <i></i>
                点赞
            </label>
            <label class="i-checks pr-sm checkbox-inline">
                <input type="checkbox" name="orderCheck" value="order" module-name="order-module">
                <i></i>
                订单
            </label>
            <label class="i-checks pr-sm checkbox-inline">
                <input type="checkbox" name="activityCheck" value="activity" module-name="activity-vote-module">
                <i></i>
                活动页投票
            </label>
            <label class="i-checks pr-sm checkbox-inline">
                <input type="checkbox" name="liveCheck" value="live" module-name="live-module">
                <i></i>
                直播间打赏
            </label>
            <label class="i-checks pr-sm checkbox-inline">
                <input type="checkbox" name="dongtaiCheck" value="dongtai" module-name="dongtai-module">
                <i></i>
                动态打赏
            </label>
        </div>
    </div>
</div>
@include('module.like-module')
@include('module.order-module')
@include('module.activity-module')
@include('module.live-module')
@include('module.dongtai-module')
<div class="line line-dashed b-b line-lg pull-in"></div>
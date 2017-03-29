<div class="form-group">
    <label class="col-sm-2 control-label">组件选择</label>
    <div class="col-sm-10">
        <div class="checkbox module">
            <label class="i-checks pr-sm">
                <input type="checkbox" value="" module-name="like-module">
                <i></i>
                点赞
            </label>
        </div>
        <div class="checkbox module">
            <label class="i-checks pr-sm">
                <input type="checkbox" value="" module-name="order-module">
                <i></i>
                订单
            </label>
        </div>
        <div class="checkbox module">
            <label class="i-checks pr-sm">
                <input type="checkbox" value="" module-name="activity-vote-module">
                <i></i>
                活动页投票
            </label>
        </div>
        <div class="checkbox module">
            <label class="i-checks pr-sm">
                <input type="checkbox" value="" module-name="live-module">
                <i></i>
                直播间打赏
            </label>
        </div>
        <div class="checkbox module">
            <label class="i-checks pr-sm">
                <input type="checkbox" value="" module-name="dongtai-module">
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
<div class="line line-dashed b-b line-lg pull-in activity-vote-module hidden"></div>
<div class="form-group activity-vote-module hidden">
    <label class="col-sm-2 control-label">活动页投票组件配置</label>
    <div class="col-sm-10" id="activity-vote-module-input">
        <div class="input-group w-md m-b">
            <input name="activity[time]" value="" id="from_date_activity" ui-jq="daterangepicker" ui-config="activity_dates" class="form-control w-md" placeholder="组件时间，默认取活动时间">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default" onclick="$('#from_date_order').click()"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
        </div>
        <div class="m-b">
            <div class="input-group bootstrap-touchspin col-md-4">
                <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                <input name="activity[num]" ui-jq="TouchSpin" type="number" value="1" class="form-control" data-min="0" data-max="999" data-verticalbuttons="true" data-verticalupclass="fa fa-caret-up" data-verticaldownclass="fa fa-caret-down" style="display: block;">
                <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                <span class="input-group-btn-vertical" style="color: red">
                                            &nbsp;&nbsp;&nbsp;&nbsp;(1元等于多少票)
                                        </span>
            </div>
        </div>
        <div>
            <input name="activity[selfToken]" value="" type="text" class="form-control" style="width: 366px;" placeholder="官方收款账号TOKEN，不填则代表非官方收款">
        </div>
    </div>
</div>
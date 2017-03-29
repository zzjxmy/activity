<div class="form-group" id="activity_attr"></div>
<div class="hidden form-group attr-parent" id="activity_add_attr">
    <label class="col-sm-2 control-label">自定义新内容</label>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="中文名称">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="字段名称（纯字母）">
            </div>
            <div class="col-md-2">
                <select name="type" class="form-control m-b">
                    <option value="1">文本</option>
                    <option value="2">多文本</option>
                    <option value="3">图片</option>
                    <option value="3">视频</option>
                    <option value="3">时间控件</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="多内容分隔符，默认以英文逗号分隔">
            </div>
            <div class="col-md-2">
                <label class="i-checks pr-sm" style="padding-top: 6px;">
                    <input type="checkbox" value="" module-name="live-module">
                    <i></i>
                    多内容
                </label>
            </div>
        </div>
        <div class="row m-b">
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-danger activity_delete_attr" onclick="return false">删除</button>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-sm btn-info" id="add_attr" onclick="return false">添加自定义属性</button>
    </div>
</div>
<div class="line line-dashed b-b line-lg pull-in dongtai-module"></div>
<div class="hidden form-group attr-parent" id="activity_add_attr">
    <label class="col-sm-2 control-label">自定义新内容</label>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-md-2">
                <input type="text" class="form-control" name="name[]" placeholder="中文名称" required>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="field[]" placeholder="字段名称（纯字母）" required>
            </div>
            <div class="col-md-2">
                <select name="type[]" class="form-control m-b">
                    <option value="1">文本</option>
                    <option value="2">多文本</option>
                    <option value="3">图片</option>
                    <option value="4">视频</option>
                    <option value="5">时间控件</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="explode[]" class="form-control" placeholder="多内容分隔符，默认以英文逗号分隔">
            </div>
            <div class="col-md-2">
                <label class="i-checks pr-sm" style="padding-top: 6px;">
                    <input type="checkbox" name="isExplode[]" value="" module-name="live-module">
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
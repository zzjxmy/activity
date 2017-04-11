@foreach($fields as $key => $value)
<label class="col-sm-2 control-label">自定义新内容</label>
<div class="col-sm-10">
    <div class="row">
        <input type="hidden" name="addInfoIds[]" value="{{$value['id']}}">
        <div class="col-md-2">
            <input type="text" class="form-control" name="old_name[]" value="{{$value['name']}}" placeholder="中文名称">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="old_field[]" value="{{$value['field']}}" placeholder="字段名称（纯字母）,最多32个字符" readonly>
        </div>
        <div class="col-md-2">
            <select name="old_type[]" class="form-control m-b">
                <option value="1" @if($value['type'] == 1) selected @endif>文本</option>
                <option value="2" @if($value['type'] == 2) selected @endif>多文本</option>
                <option value="3" @if($value['type'] == 3) selected @endif>图片</option>
                <option value="4" @if($value['type'] == 4) selected @endif>视频</option>
                <option value="5" @if($value['type'] == 5) selected @endif>时间控件</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="text" name="old_explode[]" value="{{$value['explode']}}" class="form-control" placeholder="多内容分隔符，默认以英文逗号分隔">
        </div>
        <div class="col-md-2">
            <select name="old_is_explode[]" class="form-control m-b">
                <option value="0" @if($value['is_explode'] == 0) selected @endif>不分割</option>
                <option value="1" @if($value['is_explode'] == 1) selected @endif>分割</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input type="number" class="form-control" name="old_length[]" value="{{$value['length']}}" placeholder="长度，默认255" readonly>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="old_default[]" value="{{$value['default']}}" placeholder="默认值，可为空">
        </div>
        <div class="col-md-2">
            <select name="old_unique[]" class="form-control m-b">
                <option value="0" @if($value['unique'] == 0) selected @endif>不唯一</option>
                <option value="1" @if($value['unique'] == 1) selected @endif>唯一</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="old_search[]" class="form-control m-b">
                <option value="0" @if($value['search'] == 0) selected @endif>非搜索字段</option>
                <option value="1" @if($value['search'] == 1) selected @endif>搜索字段</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="old_order_by[]" class="form-control m-b">
                <option value="0" @if($value['order_by'] == 0) selected @endif>非排序字段</option>
                <option value="1" @if($value['order_by'] == 1) selected @endif>排序字段</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="old_required[]" class="form-control m-b">
                <option value="0" @if($value['required'] == 0) selected @endif>非必填</option>
                <option value="1" @if($value['required'] == 1) selected @endif>必填</option>
            </select>
        </div>
    </div>
</div>
<div class="line line-dashed b-b line-lg pull-in"></div>
@endforeach
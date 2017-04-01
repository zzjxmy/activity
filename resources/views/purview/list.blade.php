@extends('layouts.head')
@section('content')
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">{{$master_title}}</h1>
            </div>
            <div class="wrapper-md">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$operate_title}}
                    </div>
                    <div class="table-responsive">
                        <table ui-jq="dataTable" ui-options="{
          sAjaxSource: '{{ URL::to('/purview') }}',
          aoColumns: [
            { mData: 'id' },
            { mData: 'name' },
            { mData: 'display_name' },
            { mData: 'description' },
            { mData: 'created_at' },
            { mData: 'updated_at' }
          ]
        }" class="table table-striped b-t b-b">
                            <thead>
                            <tr>
                                <th  style="width:10%">ID</th>
                                <th  style="width:18%">角色名</th>
                                <th  style="width:18%">显示名</th>
                                <th  style="width:18%">描述</th>
                                <th  style="width:18%">创建时间</th>
                                <th  style="width:18%">更新时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /content -->
@endsection


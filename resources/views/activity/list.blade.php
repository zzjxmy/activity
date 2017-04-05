@extends('layouts.head')
@section('content')
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">Static Table</h1>
            </div>
            <div class="wrapper-md">
                @section('form')
                    @include('form.activity.list-form')
                @endsection
                <table-search @submit="onSubmit"></table-search>
                @include('table.activity.list')
                @include('page.default')
            </div>
        </div>
    </div>
@endsection

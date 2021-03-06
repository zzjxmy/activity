@extends('layouts.head')
@section('content')
    <div id="content" class="app-content" role="main" v-loading.fullscreen.lock="fullscreenLoading">
        <div class="app-content-body ">
            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">{{$operate_title}}</h1>
            </div>
            <div class="wrapper-md">
                @section('form')
                    @include('form.role.list-form')
                @endsection
                <table-search @submit="onSubmit"></table-search>
                @include('table.role.list')
                @include('page.default')
            </div>
        </div>
    </div>
@endsection

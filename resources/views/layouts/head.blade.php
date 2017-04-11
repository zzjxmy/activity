<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>鱼泡泡-活动管理系统</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{asset('libs/assets/animate.css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/assets/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/assets/simple-line-icons/css/simple-line-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/jquery/bootstrap/dist/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/activity.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?unknown=polyfill"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
</head>
<body>
<div id="app" class="app app-header-fixed ">
    @include('layouts.nav')
    @include('layouts.menu')
    @yield('content')
    <!-- footer -->
    <footer id="footer" class="app-footer" role="footer">
        <div class="wrapper b-t bg-light">
            <span class="pull-right">1.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
            &copy; {{date('Y')}} Copyright.
        </div>
    </footer>
    <!-- / footer -->
</div>
@yield('form')
<script>var ajax_url = '{{isset($searchPath)?$searchPath:Request::url()}}';</script>
<script>var is_ajax = '{{$is_ajax?1:0}}';</script>
<script src="{{asset('libs/jquery/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('js/ui-load.js')}}"></script>
<script src="{{asset('js/ui-jp.config.js')}}"></script>
<script src="{{asset('js/ui-jp.js')}}"></script>
<script src="{{asset('js/ui-nav.js')}}"></script>
<script src="{{asset('js/ui-toggle.js')}}"></script>
<script src="{{asset('js/ui-client.js')}}"></script>
<script src="{{asset('js/activity.js')}}"></script>
<script src="{{asset('js/activity_vue.js')}}"></script>
<script src="{{asset('libs/jquery/moment/moment.js')}}"></script>
<script src="{{asset('libs/jquery/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@yield('script')
</body>
</html>
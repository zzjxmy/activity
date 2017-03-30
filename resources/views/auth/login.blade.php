<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>鱼泡泡活动系统</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="../libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../css/font.css" type="text/css" />
    <link rel="stylesheet" href="../css/app.css" type="text/css" />
</head>
<body>
<div class="app app-header-fixed ">


    <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
        <span class="navbar-brand block m-t">鱼泡泡活动系统</span>
        <div class="m-b-lg">
            <form name="form" class="form-validation" method="POST">
                {{ csrf_field() }}
                <div class="text-danger wrapper text-center" ng-show="authError">
                </div>
                <div class="list-group list-group-sm">
                    <div class="list-group-item {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="name" placeholder="Userame" name="name"  value="{{ old('name') }}" class="form-control no-border" ng-model="user.name" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="list-group-item {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" placeholder="Password" name="password" class="form-control no-border" ng-model="user.password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="login()" ng-disabled='form.$invalid'>Log in</button>
            </form>
        </div>
        <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
            <p>
                <small class="text-muted">yupaopao activity system<br>&copy; {{date('Y')}}</small>
            </p>
        </div>
    </div>


</div>

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="../js/ui-load.js"></script>
<script src="../js/ui-jp.config.js"></script>
<script src="../js/ui-jp.js"></script>
<script src="../js/ui-nav.js"></script>
<script src="../js/ui-toggle.js"></script>
<script src="../js/ui-client.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ mix('/js/app.js') }}"></script>
</head>
<div id="app" class="app login">
    <div class="container login-container">
        <form action="{{route('login')}}" id="loginForm" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" class="form-control" name="uid" placeholder="USER ID" value="admin">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="PASSWORD" value="password">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block">LOGIN</button>
            <button class="btn btn-success btn-lg btn-block">REGISTER</button>
        </form>
    </div>
</div>
</body>

</html>

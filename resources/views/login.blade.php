<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="/js/user.js"></script>
</head>

<body>
    <div id="app" class="app login">
        <div class="container login-container">
            @include('flash::message')
            <form action="{{route('login')}}" id="loginForm" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" id="uid" name="uid" placeholder="USER ID" value="{{ old('uid') }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                </div>
                <button id="btn_login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                <button id="btn_register" class="btn btn-success btn-lg btn-block" data-toggle="modal">REGISTER</button>
            </form>
        </div>
    </div>
</body>

<script>
    $('#flash-overlay-modal').modal();
</script>

</html>

<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('user.add')}}" method="POST" role="form" id="validateAddForm">
                {!! csrf_field() !!}

                <div class="modal-header">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">User ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="uid" name="uid" placeholder="User ID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">User Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="User Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Password Confirmation</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Password Confirmation">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                    <input id="btn_add" type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

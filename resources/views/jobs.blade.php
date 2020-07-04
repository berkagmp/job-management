@extends('layout')

@section('content')
<div class="container">
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
  </form>
</div>
@stop

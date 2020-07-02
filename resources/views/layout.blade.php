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

<body>
  <div id="app" class="app">
    @yield('content')
    @yield('scripts')
</div>
</body>

</html>

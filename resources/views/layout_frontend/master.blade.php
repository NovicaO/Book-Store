 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Diplomski</title>
    @include('partials.links')
    @yield('extraScripts')
</head>
<body>
@include('layout_frontend.navigation')


<div class="messageFlash">
    @include('flash::message')
</div>



@include('layout_frontend.pageTopText')


<div class="container">
    @yield('content')


</div>

</body>
</html>
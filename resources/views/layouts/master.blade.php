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
@include('layouts.navigation')
<div class="messageFlash">
    @include('flash::message')
</div>
@include('layouts.pageTopText')


<div class="container">
    @yield('content')

    @if(request()->path()=='administration')
        <div class="container">
            <div class="jumbotron">
                <h1>Administration panel</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra augue at odio cursus, sit amet volutpat enim cursus. Aliquam gravida, sem nec facilisis convallis, libero libero sodales nisl, eu vestibulum tortor ipsum vitae urna.</p>
            </div>
        </div>
        @endif
</div>

</body>
</html>
@extends('layouts.layout')
<title>Login</title>
<link rel="stylesheet" href="{{ asset('css/styleLogin.min.css') }}">
@section('content')
<body>
{{--originalment era un if({{$isFromLogin}})--}}
@if($isFromLogin ?? '')
    <script>window.alert("{{$wrongCred}}")</script>
@endif
{{--
commit login--}}
<div class="wrapper">
    <form action="/getUser" method="get">
        <div class="title">
            <h1>LOGIN</h1>
        </div>
        <div class="contact-form">
            <div class="input-fields">
                <input type="text" class="input" placeholder="Username" id="username" name="username">
                <input type="password" class="input" placeholder="Password" id="password" name="password">
            </div>
            <div class="btn">
                <button type="submit" class="btn1" id="register" name="register">login</button>
            </div>
        </div>
    </form>
</div>
</body>
@endsection

@extends('layouts.layout')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">
</head>
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
</html>
@endsection

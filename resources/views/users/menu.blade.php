@extends('layouts.layout')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleMenu.css') }}">
</head>
<body>

<div class="userInfoDiv">
<label class="userInfo" for="">Welcome, {{' '. strtoupper($name)}}!</label>
</div>

<div class="buttons">
    <button class="but1" onclick="window.location.href='/registerUser'">Users</button>
    <button class="but2" onclick="window.location.href='#'">Continue</button>
</div>



</body>
</html>
@endsection

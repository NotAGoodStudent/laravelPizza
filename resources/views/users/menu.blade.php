@extends('layouts.layout')
<title>Menu</title>
<link rel="stylesheet" href="{{ asset('css/styleMenu.min.css') }}">
@section('content')
<body>
<div class="userInfoDiv">
    <label class="userInfo" for="">Welcome, {{' '. strtoupper($name)}}!</label>
</div>
<div class="buttons">
    <button class="but1" onclick="window.location.href='/registerUser'">Users</button>
    <button class="but2" onclick="window.location.href='/createPizza'">Pizzas</button>
</div>
</body>
@endsection

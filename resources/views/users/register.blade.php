@extends('layouts.layout')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styleRegister.css') }}">
    <title>Register</title>
</head>
<body>
@if($added ?? '')
    <script>window.alert("{{$rightCred}}")</script>
@endif
@if($recordExists ?? '')
    <script>window.alert("{{$wrongCred}}")</script>
@endif
-@if($notEqual ?? '')
    <script>window.alert("{{$wrongCred}}")</script>
@endif
<div class="wrapper">
    <form action="/registered" method="post">
        @csrf
        <div class="title">
            <h1>register</h1>
        </div>
        <div class="contact-form">
            <div class="input-fields">
                <input type="text" class="input" placeholder="Username" id="username" name="username">
                <input type="text" class="input" placeholder="Name" id="name" name="name">
                <input type="text" class="input" placeholder="Surname" id="surname" name="surname">
                <input type="text" class="input" placeholder="Email Address" id="email" name="email">
                <input type="password" class="input" placeholder="Password" id="password" name="password">
                <input type="password" class="input" placeholder="Re-enter password" id="password2" name="password2">
            </div>
        </div>
        <div class="btn">
            <button type="submit" class="btn1" id="register" name="register">+</button>
        </div>
    </form>
</div>
<hr>
<div class="tableWrapper">
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Surname</th>
            <th>CreationDate</th>
            <th>Role</th>
        </tr>
        @foreach($users as $u)
            <tr>
                <td>{{$u->usersID}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->surname}}</td>
                <td>{{$u->creationDate}}</td>
                <td>{{$u->role}}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
@endsection

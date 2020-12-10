@extends('layouts.layout')
<link rel="stylesheet" href="{{ asset('css/styleRegister.min.css') }}">
<title>Register</title>
@section('content')
<body>
@if($added ?? '')
    <script>window.alert("{{$rightCred}}")</script>
@endif
@if($recordExists ?? '')
    <script>window.alert("{{$wrongCred}}")</script>
@endif
@if($notEqual ?? '')
    <script>window.alert("{{$wrongCred}}")</script>
@endif
@if($roleNull ?? '')
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
                <select class = 'roleSelector' name="role" id="role">
                    <option>Pick a role</option>
                    <option value="Admin">Admin</option>
                    <option value="PizzaMaker">PizzaMaker</option>
                    <option value="Delivery">Delivery</option>
                    <option value="Client">Client</option>
                </select>
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
@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>

        *{
            margin: 0;
        }
        form
        {
            width: 40%;
            margin: 5% 20%;
            background: rgba(24,24,24, 1);
            top: 0;
            text-align: center;
            padding: 5%;
            height: auto;
        }

        .content2
        {
            display: inline-block;
            width: 80%;
            margin: 5% auto;
            height: 300px;
            text-align: center;
            color: beige;
        }

        form label
        {
            display: inline-block;
            margin-top: 10px;
            width: 90px;
            text-align: left;
            margin-left: 30%;
            letter-spacing: 1.25px;
        }

        .inputs
        {
            width: 200px;
            padding: 8px;
            border: 1px solid black;
            background-color: beige;
            border-radius: 10px;
            margin-top: 10px;
            margin-left: 10%;
            color: black;
        }
        form h1
        {
            color: beige;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-size: 2.5em;
            text-shadow: 3px 3px black;
        }

        form input[type = 'submit']
        {
            background-color: beige;
            width: 200px;
            padding: 8px;
            border-radius: 10px;
            color: #181818;
            margin:10% 10%;
            text-transform: uppercase;
            letter-spacing: 1.25px;
            font-family: Poppins;

        }

        form input[type="submit"]:hover
        {
            background-color: #FF8C00;
            color: beige;
        }



    </style>
</head>
<body>
{{--originalment era un if({{$isFromLogin}})--}}
@if($isFromLogin ?? '')
    <script>window.alert("{{$wrongCred}}")</script>
@endif
{{--
commit login--}}
<form action="/getUser" method="get">
    @csrf
    <h1>Login</h1>
    <div class="content2">
        <label for="email">Username: </label>
        <input class="inputs" type="text" id="username" name="username" required>
        <label for="password">Password: </label>
        <input class="inputs" type="password" id="password" name="password">
        <input type="submit" value="login" name="login" id="login">
    </div>
</form>
</body>
</html>

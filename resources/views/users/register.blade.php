<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@if($recordExists ?? '')
    <script>window.alert("Something went wrong...")</script>
@endif

<form action="/addUser">
    <input type="text" id="email" name="email" placeholder="Email: ">
    <input type="text" id="username" name="username" placeholder="Username: ">
    <input type="text" id="name" name="name" placeholder="Name: ">
    <input type="text" id="surname" name="surname" placeholder="Surname: ">
    <input type="password" id="password" name="password" placeholder="Password: ">
    <input type="password" id="password2" name="password2" placeholder="Password: ">
    <div class="add">
        <button type="submit" id="add" name="add">+</button>
    </div>
</form>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/layout.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
    <title>Pizza</title>
</head>
<header>
    <nav id ='nav'>
        <div class="logo">
            <h4><a href="/">Pizza</a></h4>
        </div>
        <ul class="nav-link" id="navul">
            <li> <a href="#" class="link">Undef</a></li>
            <li> <a href="#" class="link">Undef2</a></li>
            @if(session('currentUser')!= null)
                <li> <a href="/orderPizza" class="link">Order Pizza</a></li>
            <li> <a href="/logout" class="link">Logout</a></li>
            @else
                <li> <a href="#" class="link">Undef3</a></li>
            @endif
        </ul>
        <div class="burger" onclick="toggleBurger('navul')">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
<hr class="hrst">
<body>
@yield('content')
</body>
<footer>
    <div class="footerContent">
        <div class="faBox">
            <a href="" class="fa fa-twitter"></a>
            <a href="" class="fa fa-linkedin"></a>
            <a href="" class="fa fa-instagram"></a>
            <a href="" class="fa fa-facebook"></a>
        </div>
        <p>&copy; Stephen Donoghue</p>
    </div>
</footer>
</html>

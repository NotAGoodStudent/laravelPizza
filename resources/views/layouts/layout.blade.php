<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
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
            <li> <a href="/" class="link">Undef3</a></li>
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

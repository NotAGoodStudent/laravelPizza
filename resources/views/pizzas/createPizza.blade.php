@extends('layouts.layout')
<link rel="stylesheet" href="{{ asset('css/styleRegister.min.css') }}">
<title>Create Pizza</title>
@section('content')
    <body>
    <div class="wrapper">
        <form action="/created" method="post">
            @csrf
            <div class="title">
                <h1>Create Pizza</h1>
            </div>
            <div class="contact-form">
                <div class="input-fields">
                    <input type="text" class="input" placeholder="Pizza type" id="type" name="type">
                    <select class = 'roleSelector' name="crust" id="crust">
                        <option value="">Pick a crust type</option>
                        <option value="Thin">Thin crust</option>
                        <option value="Thick">Thick crust</option>
                        <option value="Focaccia">Focaccia crust</option>
                        <option value="Filled">Cheese filled crust</option>
                    </select>
                    <input type="text" class="input" placeholder="Price" id="price" name="price">
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
                <th>Type</th>
                <th>Crust</th>
                <th>Price</th>
                <th>CreationDate</th>
            </tr>
            @foreach($pizzas as $p)
                <tr>
                    <td>{{$p->type}}</td>
                    <td>{{$p->crust}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->creationDate}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    </body>
@endsection

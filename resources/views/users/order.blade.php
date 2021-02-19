@extends('layouts.layout')
<title>Order Pizza</title>
<link rel="stylesheet" href="{{ asset('css/styleOrderPizza.css') }}">
@section('content')
    <section class="products">
        @foreach($pizzas as $p)
        <div class="product-card">
            <div class="product-image">
                <img src="https://images.telepizza.com/vol/es/images/content/productos/new/bkrg_d.jpg   ">
            </div>
            <div class="productInfo">
                <p>{{$p->type}}</p>
                <p>{{$p->ing1}}</p>
                <p>{{$p->ing2}}</p>
                <p>{{$p->ing3}}</p>
                <p>{{$p->type}}</p>
                <p>{{$p->price}}</p>
            </div>
            <div class="product-buttons">
                <button class="add" id="add" type="button" onclick="addValue({{$p->pizzaID}})">+</button>
                <button class="sub" id="sub" type="button" onclick="subValue({{$p->pizzaID}})">-</button>
                <form action="" method="post">
                <input class="inputBut" type="number" min="0" id="{{$p->pizzaID}}" max="100" class="sub">
                    <button name="submitButton" id="{{$p->pizzaID}}">To Cart</button>
                </form>
            </div>
        </div>
        @endforeach
            <div class="clearButtons">
                <button class="clear" onclick="clearValues()">Clear</button>
                <button class="confirm" type="submit">Confirm</button>
            </div>
    </section>
    <script>
        function addValue(id)
        {
            var input = document.getElementById(id);
            if(input.value < 100) {
                input.value++;
            }
        }

        function subValue(id)
        {

                var input = document.getElementById(id);
                if(input.value > 0) {
                    input.value--;
                }
        }

        function clearValues()
        {
            var elements = document.getElementsByClassName('inputBut');
            for(var i = 0; i < elements.length;i++)
            {
                elements[i].value = 0;
            }
        }
        </script>
@endsection

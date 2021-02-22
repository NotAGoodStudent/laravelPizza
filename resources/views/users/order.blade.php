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
                <form action="/confirmation" method="get">
                <input class="inputBut" name="quantity" type="number" min="0" id="{{$p->pizzaID}}" max="100" class="sub">
                    <button name="submitButton" value="{{$p->pizzaID}}">To Cart</button>
                </form>
            </div>
        </div>
        @endforeach

            <div class="clearButtons">
                <form action="/checkout" method="get">
                <button class="clear" type="button" onclick="clearValues()">Clear</button>
                <button class="confirm" type="submit">Confirm</button>
                </form>
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

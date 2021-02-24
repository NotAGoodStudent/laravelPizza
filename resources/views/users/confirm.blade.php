@extends('layouts.layout')
<title>Menu</title>
<link rel="stylesheet" href="{{ asset('css/confirmation.css') }}">
@section('content')
        @foreach($boughtPizzas as $p)
            @foreach($pizzas as $pi)
                @if($p->pizzaID == $pi->pizzaID)
                    <div class="data">
                        <p>Pizza: {{$pi->type}} - {{$pi->ing1}} - {{$pi->ing2}} - {{$pi->ing3}} - {{$pi->crust}} - {{$p->quantity}}</p>
                    </div>
                @endif
            @endforeach

        @endforeach
        <div class="buttons">
            <form action="/cancelBill" method="post">
                @csrf
            <button class="clear">Cancel</button>
            </form>
            <form action="/payBill" method="post">
                @csrf
            <button class="confirm"> Confirm</button>
            </form>
        </div>
@endsection

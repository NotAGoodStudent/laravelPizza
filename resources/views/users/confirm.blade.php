@extends('layouts.layout')
<title>Menu</title>
<link rel="stylesheet" href="{{ asset('css/styleMenu.min.css') }}">
@section('content')
    <p>{{count($boughtPizzas)}}</p>
        @foreach($boughtPizzas as $p)
            <p>{{$p}}</p>
        @endforeach
@endsection

@extends('layouts.default')

@section('title', '')
@section('description', '')

@section('content')
<div class="container">
    <div class="starter-template">
        <h1>{{ $sku->product->name }}</h1>
        <h2>{{ $sku->product->category->name }}</h2>
        <p>Цена: <b>{{ $sku->price }} R</b></p>
        <img src="/storage/products/iphone_x.jpg">
        <p>{{ $sku->product->description }}</p>

        <form action="{{ route('basket_add',$sku->product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
            @csrf
      </form>

        <form action="{{ route('subscription', $sku->product) }}" method="POST">
            @csrf
            <input type="email" name="email" class="form-control">
            <button type="submit" class="btn btn-success" role="button">Сообщить</button>
        </form>
    </div>
</div>
@endsection

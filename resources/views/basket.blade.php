@extends('layouts.default')

@section('title', 'Корзина')
@section('description', 'Ваши заказы')

@section('content')
    <div class="container">
        <div class="starter-template">

            <h1>Корзина</h1>
            <p>Оформление заказа</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('product',[$product->category->code, $product->code]) }}">
                                    <img height="56px" src="/storage/products/haier.jpg">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td><span class="badge">{{ $product->countInOrder }}</span>
                                <div class="btn-group form-inline">
                                    <form action="{{ route('basket_delete',$product) }}" method="POST">
                                        <button type="submit" class="btn btn-danger" href=""><span
                                                class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                        @csrf                           </form>
                                    <form action="{{ route('basket_add',$product) }}" method="POST">
                                        <button type="submit" class="btn btn-success" href=""><span
                                                class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                        @csrf                           </form>
                                </div>
                            </td>
                            <td>{{ $product->price }} {{ \App\Services\CurrencyConvert::getCurrencySymbol() }}</td>
                            <td>{{ $product->price * $product->countInOrder }} {{\App\Services\CurrencyConvert::getCurrencySymbol()}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td>{{ $order->getFullSum() }} {{ \App\Services\CurrencyConvert::getCurrencySymbol() }}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href="{{ route('order') }}">Оформить заказ</a>
                </div>
            </div>
        </div>
    </div>
@endsection

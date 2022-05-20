@extends('layouts.default')

@section('title', 'Подтвердить заказ')
@section('description', 'Подтвердить заказ!!!')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>Подтвердите заказ:</h1>
            <div class="container">
                <div class="row justify-content-center">
                    <p>Общая стоимость: <b>{{ $order->getFullSum() }} {{ \App\Services\CurrencyConvert::getCurrencySymbol() }}</b></p>
                    <form action="{{ route('order_confirm') }}" method="POST">
                        <div>
                            <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

                            <div class="container">
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                                    <div class="col-lg-4">
                                        <input type="text" name="name" id="name" value="" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер
                                        телефона: </label>
                                    <div class="col-lg-4">
                                        <input type="text" name="phone" id="phone" value="" class="form-control">
                                    </div>
                                </div>
                                @guest
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="phone" class="control-label col-lg-offset-3 col-lg-2">E-mail: </label>
                                    <div class="col-lg-4">
                                        <input type="email" name="email" id="email" value="" class="form-control">
                                    </div>
                                </div>
                                @endguest
                                <br>
                            </div>
                            <br>
                            @csrf
                            <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

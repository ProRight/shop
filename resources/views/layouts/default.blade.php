<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Интернет Магазин: Главная')</title>
    <meta name="description" content="@yield('description','Интернет Магазин: Описание')"/>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">{{ __('main.online_shop') }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('index') }}">@lang('main.all_product')</a></li>
                <li><a href="{{ route('categories') }}">Категории</a>
                </li>
                <li><a href="{{ route('basket') }}">В корзину</a></li>
                <li><a href="/reset">Сбросить проект в начальное состояние</a></li>
                <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>

                <li class="dropdown">
                    <ul class="dropdown-menu">
                        @foreach($Currencies as $currency)
                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->code }}</a></li>
                        @endforeach
                    </ul>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">{{ \App\Services\CurrencyConvert::getCurrencySymbol() }}<span
                            class="caret"></span></a>

                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">Войти</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@include('includes.alert')
@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6"><p>Категории товаров</p>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6"><p>Самые популярные товары</p>
                {{--                <ul>@foreach($bestProducts as $bestProduct)--}}
                {{--                    <li><a href="{{ route('product', [$bestProduct->category->code, $bestProduct->code]) }}">{{ $bestProduct->name }}</a></li>--}}
                {{--                    @endforeach--}}
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

@extends('auth.layouts.default')

@section('title', 'Товарные предложения')

@section('content')
    <div class="col-md-12">
        <h1>@yield('title')</h1>
        <h2>{{ $product->name }}</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($skus as $sku)
                <tr>
                    <td>{{ $sku->id }}</td>
                    <td>{{ $sku->product->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.skus.destroy',[$product, $sku]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-success" type="button"
                                   href="{{ route('admin.skus.show',[$product, $sku]) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('admin.skus.edit',[$product, $sku]) }}">Редактировать</a>

                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $skus->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('admin.skus.create', $product) }}">Добавить категорию</a>
    </div>
@endsection

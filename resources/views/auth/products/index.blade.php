@extends('auth.layouts.default')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>@yield('title')</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действия
                </th>
            </tr>
@foreach($products as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->code }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.products.destroy',$cat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-success" type="button" href="{{ route('admin.products.show',$cat->id) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('admin.products.edit',$cat->id) }}">Редактировать</a>
                                <a class="btn btn-warning" type="button" href="{{ route('admin.skus.index',$cat->id) }}">SKUS</a>
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>

        <a class="btn btn-success" type="button"
           href="{{ route('admin.products.create') }}">Добавить категорию</a>
    </div>
@endsection

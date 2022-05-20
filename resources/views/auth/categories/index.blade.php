@extends('auth.layouts.default')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>Категории</h1>
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
@foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->code }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.categories.destroy',$cat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-success" type="button" href="{{ route('admin.categories.show',$cat->id) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('admin.categories.edit',$cat->id) }}">Редактировать</a>
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>

        <a class="btn btn-success" type="button"
           href="{{ route('admin.categories.create') }}">Добавить категорию</a>
    </div>
@endsection

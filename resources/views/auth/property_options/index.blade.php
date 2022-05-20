@extends('auth.layouts.default')

@section('title', 'варианты Свойства: '.$property->name )

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
                    Свойство
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($propertyOptions as $propertyOption)
                <tr>
                    <td>{{ $propertyOption->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $propertyOption->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.property-options.destroy',[$property,$propertyOption]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-success" type="button"
                                   href="{{ route('admin.property-options.show',[$property,$propertyOption]) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('admin.property-options.edit', [$property,$propertyOption]) }}">Редактировать</a>
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $propertyOptions->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('admin.property-options.create' , $property) }}">Добавить вариант свойства</a>
    </div>
@endsection

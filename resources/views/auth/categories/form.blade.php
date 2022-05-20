@extends('auth.layouts.default')

    @section('title', isset($category) ? 'Редактировать категорию '.$category->name : 'Создать категорию')

@section('content')
    <div class="col-md-12">
            <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              action="{{ isset($category) ? route('admin.categories.update',$category->id) : route('admin.categories.store') }}">
            @csrf
            @isset($category)
                @method('PUT')
            @endisset
            <div>

                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ $category->code ?? "" }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $category->name ?? "" }}">
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description" cols="72"
                                  rows="7">{{ $category->description ?? "" }}</textarea>
                    </div>
                </div>
                <br>
                <br>

                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection

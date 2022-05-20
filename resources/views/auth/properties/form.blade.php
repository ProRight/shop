@extends('auth.layouts.default')

@section('title', isset($property) ? 'Редактировать свойства '.$property->name : 'Создать свойства')

@section('content')
    <div class="col-md-12">
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              action="{{ isset($property) ? route('admin.properties.update',$property->id) : route('admin.properties.store') }}">
            @csrf
            @isset($property)
                @method('PUT')
            @endisset
            <div>


                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $property->name ?? "" }}">
                        @error('name') {{ $message }} @enderror
                    </div>
                </div>

                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название EN: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name_en" id="name"
                               value="{{ $property->name_en ?? "" }}">
                        @error('name_en') {{ $message }} @enderror
                    </div>
                </div>

                <br>
                <br>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection

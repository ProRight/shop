@extends('auth.layouts.default')

@section('title', (isset($propertyOptions) ? 'Редактировать вар свойства '.$propertyOptions->name : 'Создать ВАР свойства').'<--'.$property->name)

@section('content')
    <div class="col-md-12">
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              action="{{ isset($propertyOptions) ? route('admin.property-options.update',[$property, $propertyOptions]) : route('admin.property-options.store',$property) }}">
            @csrf
            @isset($propertyOptions)
                @method('PUT')
            @endisset
            <div>


                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $propertyOptions->name ?? "" }}">
                        @error('name') {{ $message }} @enderror
                    </div>
                </div>

                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название EN: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name_en" id="name"
                               value="{{ $propertyOptions->name_en ?? "" }}">
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

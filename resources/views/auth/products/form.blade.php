@extends('auth.layouts.default')

@section('title', isset($product) ? 'Редактировать товар '.$product->name : 'Создать товар')

@section('content')
    <div class="col-md-12">
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              action="{{ isset($product) ? route('admin.products.update',$product->id) : route('admin.products.store') }}">
            @csrf
            @isset($product)
                @method('PUT')
            @endisset
            <div>

                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ $product->code ?? "" }}">
                        @include('auth.layouts.error',['fieldName'=>'code'])
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $product->name ?? "" }}">
                        @include('auth.layouts.error',['fieldName'=>'name'])
                    </div>
                </div>
                <br><br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Свойства товара: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'property_id[]'])
                        <select name="property_id[]" multiple>
                            @foreach($properties as $property)
                                <option value="{{ $property->id }}"
                                        @selected(isset($product) && $product->properties->contains($property->id))
                                >{{ $property->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">

                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @include('auth.layouts.error',['fieldName'=>'category_id'])
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description" cols="72"
                                  rows="7">{{ $product->description ?? "" }}</textarea>
                        @include('auth.layouts.error',['fieldName'=>'description'])
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
                        @include('auth.layouts.error',['fieldName'=>'file'])
                    </div>
                </div>
                <br><br>
                @foreach(['new'=>'Новинки','hit'=>'Хиты','recomend'=>'Рекомандуемые'] as $field=>$title)
                    <div class="input-group row">
                        <label for="{{ $field }}" class="col-sm-2 col-form-label">{{ $title }}: </label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="{{ $field }}" id="{{ $field }}" @checked(isset($product) && $product->$field == '1')>
                            @include('auth.layouts.error',['fieldName'=>$field])
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection

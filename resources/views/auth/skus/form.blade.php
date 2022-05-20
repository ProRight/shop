@extends('auth.layouts.default')

@section('title', isset($skus) ? 'Редактировать sku '.$skus->name : 'Создать sku')

@section('content')
    <div class="col-md-12">
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              action="{{ isset($skus) ? route('admin.skus.update',[$product, $skus->id]) : route('admin.skus.store', $product) }}">
            @csrf
            @isset($skus)
                @method('PUT')
            @endisset

            <div class="input-group row">
                <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                <div class="col-sm-2">
                    @include('auth.layouts.error', ['fieldName' => 'price'])
                    <input type="text" class="form-control" name="price"
                           value="@isset($skus){{ $skus->price }}@endisset">
                </div>
            </div>
            <div class="input-group row">
                <label for="count" class="col-sm-2 col-form-label">Кол-во: </label>
                <div class="col-sm-2">
                    @include('auth.layouts.error', ['fieldName' => 'count'])
                    <input type="text" class="form-control" name="count"
                           value="@isset($skus){{ $skus->count }}@endisset">
                </div>
            </div>
            <br>


            <div>

                @foreach($product->properties as $property)
                    <div class="input-group row">
                        <label for="property_id[{{ $property->id }}]" class="col-sm-2 col-form-label">{{ $property->name }}: </label>
                        <div class="col-sm-6">

                            <select name="property_id[{{ $property->id }}]" class="form-control">
                                @foreach($property->propertyOptions as $propertyOption)
                                    <option value="{{ $propertyOption->id }}">{{ $propertyOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
                <br>
                <br>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection

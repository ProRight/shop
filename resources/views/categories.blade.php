@extends('layouts.default')

@section('title','Категории все')
@section('description','Описание категории')

@section('content')
<div class="container">
    <div class="starter-template">
        @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img src="/storage/categories/mobile.jpg">
                <h2>{{ $category->__('name') }}</h2>
            </a>
            <p>
                {{ $category->__('description') }}
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection

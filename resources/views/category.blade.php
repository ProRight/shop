@extends('layouts.default')

@section('title', $category->name)
@section('description', $category->description)

@section('content')
<div class="container">
    <div class="starter-template">
        <h1>
            {{ $category->name }} ({{ $category->products->count() }})
        </h1>
        <p>
            {{ $category->description }}
        </p>
        @include('includes.card',['products'=>$category->products])
    </div>
</div>
@endsection

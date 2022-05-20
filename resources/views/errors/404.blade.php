@extends('layouts.default')
@section('content')
    <div class="container">
        <h2 class="text-center">{{ $exception->getMessage() }}</h2></div>
@endsection

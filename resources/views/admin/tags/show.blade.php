@extends('layouts.admin')

{{-- @dump($car->tags) --}}

@section('content')
    <h1>Nome: {{$tag->name}}</h1>
    
@endsection
@extends('layouts.admin')
{{-- @dump($car->tags) --}}
{{-- @include('partials/popupdelete') --}}


@section('content')
    <h1>Nome: {{$tag->name}}</h1>
    <button type="submit" onclick="boolpress.openModal(event, {{$tag->id}})" class="btn btn-warning delete">Delete</button>
    
@endsection
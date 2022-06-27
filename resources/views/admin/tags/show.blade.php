@extends('layouts.admin')

{{-- @dump($car->tags) --}}

@section('content')
    <h1>Nome: {{$car->name}}</h1>
    <h3>Modello: {{$car->model}}</h3>
    @if($car->category)
        <h4>Alimentazione: {{$car->category['name']}}</h4>
    @endif
    <p>Descrizione: {{$car->description}}</p>
    <h5>Disponibile: {{$car->available  ? 'si' : 'no'}}</h5>
    <small>creato il: {{$car->created_at}}</small>
    <ul>
        @foreach($car->tags as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ul>
@endsection
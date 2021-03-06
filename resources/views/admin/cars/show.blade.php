@extends('layouts.admin')
@include('partials/popupdelete')
{{-- @dump($car->tags) --}}

@section('content')
    <h1>Nome: {{$car->name}}</h1>
    <h3>Modello: {{$car->model}}</h3>
    @if($car->category)
        <h4>Alimentazione: {{$car->category['name']}}</h4>
    @endif
    @if ($car->image)
        <div class="text-center w-25 mt-3">
            <img src="{{ asset('storage/' . $car->image) }}" class="rounded "
                alt="{{ $car->title }}">
        </div>
    @endif

    <p>Descrizione: {!! $car->description !!}</p>
    <h5>Disponibile: {{$car->available  ? 'si' : 'no'}}</h5>
    <small>creato il: {{$car->created_at}}</small>
    <ul>
        @foreach($car->tags as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ul>
    <button type="submit" onclick="boolpress.openModal(event, {{$car->id}})" class="btn btn-warning delete">Delete</button>
@endsection



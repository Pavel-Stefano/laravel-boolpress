@extends('layouts.admin')
{{-- @dump($cars) --}}

@include('partials/popupdelete')


@section('content')
<a href="{{route('admin.cars.create')}}" class="btn btn-primary">Aggiungi nuova auto </a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Model</th>
        <th scope="col">Modifica</th>
        <th scope="col">Cancella</th>
        {{-- <th scope="col">Disponibile</th> --}}
      </tr>
    </thead>
    <tbody>
    @foreach ($cars as $car)
    <tr>
      <td> <a href="{{route('admin.cars.show', $car->id)}}">{{$car->id}} </a></td>
      <td> <a href="{{route('admin.cars.show', $car->id)}}">{{$car->name}} </a></td>
      <td> <a href="{{route('admin.cars.show', $car->id)}}">{{$car->model}} </a></td>
      <td> <a href="{{route('admin.cars.edit', $car->id)}}" class="btn btn-info">Modifica </a></td>
      <td> 
        <form action="{{route('admin.cars.destroy', $car->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="boolpress.openModal(event, {{$car->id}})" class="btn btn-warning delete">Delete</button>
        </form>
      </td>


      {{-- <td>{{$car->available ? 'si' : 'no'}}</td> --}}
    </tr>
    @endforeach
      
    </tbody>
  </table>
  {{ $cars->links() }}
    
@endsection
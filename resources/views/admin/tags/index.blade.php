@extends('layouts.admin')
{{-- @dump($cars) --}}
@include('partials/popupdelete')

@section('content')

<a href="{{route('admin.tags.create')}}" class="btn btn-primary">Aggiungi tag </a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Modifica</th>
        <th scope="col">Cancella</th>
        {{-- <th scope="col">Disponibile</th> --}}
      </tr>
    </thead>
    <tbody>
    @foreach ($tags as $tag)
    <tr>
      <td> <a href="{{route('admin.tags.show', $tag->id)}}">{{$tag->id}} </a></td>
      <td> <a href="{{route('admin.tags.show', $tag->id)}}">{{$tag->name}} </a></td>
      <td> <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-info">Modifica </a></td>
      <td> 
        <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="boolpress.openModal(event, {{$tag->id}})" class="btn btn-warning delete">Delete</button>
        </form>
      </td>


      {{-- <td>{{$car->available ? 'si' : 'no'}}</td> --}}
    </tr>
    @endforeach
      
    </tbody>
  </table>
  {{ $tags->links() }}
    
@endsection
@extends('layouts.admin')
{{-- @dump($cars) --}}

@include('partials/popupdelete')


@section('content')
<a href="{{route('admin.categories.create')}}" class="btn btn-primary">Aggiungi nuova categoria </a>

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
    @foreach ($categories as $category)
    <tr>
      <td> <a href="{{route('admin.categories.show', $category->id)}}">{{$category->id}} </a></td>
      <td> <a href="{{route('admin.categories.show', $category->id)}}">{{$category->name}} </a></td>
      <td> <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-info">Modifica </a></td>
      <td> 
        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="boolpress.openModal(event, {{$category->id}})" class="btn btn-warning delete">Delete</button>
        </form>
      </td>


      {{-- <td>{{$car->available ? 'si' : 'no'}}</td> --}}
    </tr>
    @endforeach
      
    </tbody>
  </table>
  {{ $categories->links() }}
    
@endsection
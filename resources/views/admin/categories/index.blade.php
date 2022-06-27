@extends('layouts.admin')
{{-- @dump($cars) --}}
@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm car delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare l'elemento con id: @{{itemId}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @@click="submitForm()">Si cancella</button>
      </div>
    </div>
  </div>
</div>

<a href="{{route('admin.categories.create')}}" class="btn btn-prymary">Aggiungi nuova categoria </a>

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
          <button type="submit" @@click="openModal($event, {{$category->id}})" class="btn btn-warning delete">Delete</button>
        </form>
      </td>


      {{-- <td>{{$car->available ? 'si' : 'no'}}</td> --}}
    </tr>
    @endforeach
      
    </tbody>
  </table>
  {{ $categories->links() }}
    
@endsection
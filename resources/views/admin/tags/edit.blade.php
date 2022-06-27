@extends('layouts.admin')

@section('content')
<form action="{{route('admin.cars.update', $car->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name', $car->name)}}" placeholder="inserisci name">
      
    </div>
    <div class="mb-3">
      <label for="model" class="form-label">Model</label>
      <input type="text" class="form-control" id="model" name="model" value="{{old('model', $car->model)}}" placeholder="inserisci model">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{old('description', $car->description)}}</textarea>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">category</label>
      <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror ">
        <option value="">Selezionare categoria</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}" {{$category->id == old('category->id', $car->category_id) ? 'selected' : ''}}> {{$category->name}}</option>
        @endforeach
      </select>
      @error('category_id')
        <div class="alert alert-danger">
          {{$message}}
        </div>
      @enderror
    </div>

    

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="available" name="available" {{old('available') ? 'checked' : ''}}>
      <label class="form-check-label" for="available">Disponibile: </label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
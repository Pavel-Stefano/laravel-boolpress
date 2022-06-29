@extends('layouts.admin')

@section('content')
<form action="{{route('admin.cars.update', $car->id)}}" method="POST" enctype="multipart/form-data">
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

    <div class="form-group">
      @if ($car->image)
      <img id="uploadPreview" width="100" src="{{ asset("storage/{$car->image}")}}" alt="{{$car->name}}">
      @else
      <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
      @endif
      <label for="image" >Aggiungi immagine</label>
      <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
    </div>



    <div class="mb-3">
      <div class="form-group">
        <h5>Tags</h5>
        
          @foreach($tags as $tag)
          <div class="form-check-inline">
            @if (old("tags"))
            <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}>
            @else
            <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{($car->tags->contains($tag)) ? 'checked' : ''}}>
            @endif
            <label class="form-check-label" for="{{$tag->slug}}">{{$tag->slug}} </label>
          </div>
          @endforeach
      </div>
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="available" name="available" {{old('available') ? 'checked' : ''}}>
      <label class="form-check-label" for="available">Disponibile: </label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection
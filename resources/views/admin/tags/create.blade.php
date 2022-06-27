@extends('layouts.admin')
{{-- @dump($tags) --}}

@section('content')
<form action={{route('admin.tags.store')}} method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="inserisci name">
      
    </div>
    {{-- <div class="mb-3">
      <label for="model" class="form-label">Model</label>
      <input type="text" class="form-control" id="model" name="model" value="{{old('model')}}" placeholder="inserisci model">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
    </div> --}}

    <div class="mb-3">
      <label for="tag" class="form-label">tag</label>
      <select name="tag_id" id="tag" class="form-control">
        <option value="">Selezionare categoria</option>
        @foreach ($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <div class="form-group">
        <h5>Tags</h5>
        
          @foreach($tags as $tag)
          <div class="form-check-inline">
            <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}>
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

@endsection
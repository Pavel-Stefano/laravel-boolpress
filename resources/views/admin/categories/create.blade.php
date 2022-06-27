@extends('layouts.admin')
{{-- @dump($tags) --}}

@section('content')
<form action={{route('admin.categories.store')}} method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="inserisci name">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
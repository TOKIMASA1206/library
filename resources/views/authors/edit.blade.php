@extends('layouts.app')


@section('title', 'Library');

@section('content')




<div class="container-fluid w-75">
  <div class=" table-title mt-5">
    Authors
  </div>

  <form action="{{route('authors.update',$author)}}" method="post">
      @csrf
      @method('PATCH')
      <div class="row mb-3">
          <div class="col">
              <input type="text" name="author_name" class="form-control" value="{{$author->name}}" required>
          </div>
        </div>
        <div class="row">
          <div class="col">
              <a href="{{route('authors.create')}}" class="btn btn-outline-warning px-2 w-100">Cancel</a>
          </div>
          <div class="col">
              <button class="btn btn-warning px-2 w-100">Update</button>
          </div>
        </div>
      </form>
</div>


@endsection
@extends('layouts.app')


@section('title', 'Library');

@section('content')




<div class="container">
  <div class=" table-title mt-5">
    Edit Books
  </div>
{{-- 
  <form action="{{route('books.update',$book)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="row mb-3">
          <div class="col">
              <input type="text" name="book_name" class="form-control" value="{{$book->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col">
              <a href="{{route('books.create')}}" class="btn btn-outline-warning px-2 w-100">Cancel</a>
          </div>
          <div class="col">
              <button class="btn btn-warning px-2 w-100">Update</button>
          </div>
        </div>
      </form> --}}

    <div class="row">
      <div class="col-4 mt-4" style="overflow: hidden;">
        <img src="{{ asset('storage/images/' . $book->image) }}" alt="Image Description">
      </div>



      <div class="col">
        <form action="{{route('books.update',$book)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="row mb-3">
            <div class="col">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" name="title" class="form-control" value="{{$book->title}}">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="year" class="form-label">Year Published</label>
              <input type="number" id="year" name="year" min="1000" max="9999" maxlength="4"  class="form-control" placeholder="YYYY" value="{{$book->year_published}}">
            </div>
            <div class="col">
              <label for="categories" class="form-label">Author</label>
              <select name="author" id="author" class="form-select">
                <option value="">ANONIMAS</option>
                @foreach($all_authors as $author)
                <option value="{{$author->id}}" 
                  @if($author->id == $book->author_id) selected @endif>
                  {{$author->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="image" class="form-label">Cover Photo</label>
              <input type="file" id="image" name="image" class="form-control">
            </div>
            <p>acceptable formats:jpeg,jpg,png,only <br>
              Maximum file size:1048kb
            </p>
          </div>
          <div class="row">
            <div class="col">
              <a href="{{route('books.create')}}" class="btn btn-outline-warning px-2 w-100">Cancel</a>
          </div>
          <div class="col">
              <button class="btn btn-warning px-2 w-100">Update</button>
          </div>
          </div>
      </form>
      </div>
    </div>
</div>


@endsection
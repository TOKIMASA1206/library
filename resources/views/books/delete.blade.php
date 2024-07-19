@extends('layouts.app')


@section('title', 'Library');

@section('content')


<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card w-100 text-center mx-auto">
        <div class="card-body">
          <p class="text-danger fs-1">
            <i class="fa-solid fa-triangle-exclamation text-danger fs-1"></i> Delete Book
          </p>
          <p>Do you want to delete <span class="fw-bold">{{$book->name}}</span> ?</p>

          <div class="row">
            <div class="col">
                <a href="{{route('books.create')}}" class="btn btn-outline-danger px-2 w-100">Cancel</a>
            </div>
            <div class="col">
              <form action="{{route('books.destroy', $book)}}" method="post">
                @csrf
            @method('DELETE')
                <button type="submit" class=" py-2 px-3 w-100 btn btn-danger">
                    Delete
                </button>
            </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
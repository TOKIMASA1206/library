@extends('layouts.app')


@section('title', 'Library');

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h1>Book Preview</h1>
                    </div>
                    <div class="col">
                      <a href="{{ route('books.edit', $book) }}" class="btn btn-warning py-2 px-3 float-end ms-2">Edit this
                          book</a>
                        <a href="{{ route('books.create') }}" class="btn btn-warning py-2 px-3 float-end">Back</a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center" style="overflow: hidden;" >
                        <img src="{{ asset('storage/images/' . $book->image) }}" alt="Image Description" style="max-height:400px;">
                    </div>
                    <div class="col">
                        <h1>{{ $book->title }}</h1>
                        <span>
                          @if(empty($book->author->name))
                            @else
                          by {{ $book->author->name }}
                          @endif
                        </span>

                        <p class="mt-3">Published in {{ $book->year_published }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

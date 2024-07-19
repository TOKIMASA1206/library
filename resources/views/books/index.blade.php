@extends('layouts.app')


@section('title', 'Library');

@section('content')

<div class="container">
  <div class="row mt-5">
    <div class="col">
      <div class="card home_card text-primary">
        <h1><a href="{{route('authors.create')}}" class=" text-primary">Authors {{ $authorsCount }}</a></h1>
      </div>
    </div>
    <div class="col">
      <div class="card home_card">
        <h1><a href="{{route('books.create')}}" class="text-success">Books {{ $booksCount }}</a></h1>
      </div>
    </div>
  </div>
</div>


@endsection
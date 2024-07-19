@extends('layouts.app')


@section('title', 'Library');

@section('content')




<div class="container-fluid w-75">
  <div class=" table-title mt-5">
    Add new book
  </div>

  <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row mb-3">
        <div class="col">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label for="year" class="form-label">Year Published</label>
          <input type="number" id="year" name="year" min="1000" max="9999" maxlength="4"  class="form-control" placeholder="YYYY" required>
        </div>
        <div class="col">
          <label for="categories" class="form-label">Author</label>
          <select name="author" id="author" class="form-select">
            <option value="">ANONIMAS</option>
            @foreach($all_authors as $author)
            <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="image" class="form-label">Cover Photo</label>
          <input type="file" id="image" name="image" class="form-control" required>
        </div>
        <div class="col">
          <label for="" class="form-label"></label>
          <button class="btn btn-success px-2 w-100 mt-4"><i class="fa-solid fa-plus"></i>ADD</button>
        </div>
      </div>
      <p>acceptable formats:jpeg,jpg,png,only <br>
        Maximum file size:1048kb

      </p>
  </form>

  <hr class="my-5">

  <div class="">
    <div class=" table-title mt-5">
      All Books
    </div>
      <table class="table table-hover w-100 mx-auto">
          <tbody>

              @forelse ($all_books as $book)
                  <tr class="">
                      <th class="text-center mt-3">{{ $book->id }}</th>
                      <td class="mt-3">
                        <form action="{{route('books.favorite',$book)}}" method="POST" style="display: inline;">
                          @csrf
                          @method('POST')
                          <button type="submit" class="btn {{ $book->isFavorited() ? 'btn-danger' : 'btn-outline-danger' }}">
                            <i class="fa-regular fa-heart"></i><!-- ハートのアイコン -->
                        </button>
                      </form>
                      </td>
                      <td class="mt-3"><a href="{{route('books.show',$book)}}">{{ $book->title }}</a>
                        <a href="{{route('books.destroy_confirm', $book)}}" class=" py-2 px-3 text-danger float-end">
                          <i class="fa-solid fa-trash"></i>
                      </a>

                      <a href="{{route('books.edit', $book)}}" class="text-warning py-2 px-3 float-end"><i
                              class="fa-solid fa-pen-to-square"></i></a>
                      </td>
                  </tr>
              @empty
                  <div class="">
                      <h2 class="text-muted text-center">No items yet</h2>
                  </div>
              @endforelse
          </tbody>
      </table>
  </div>



  <div class="row text-center mt-5">
    <div class="col">
      <a href="{{ url('/') }}" class="home btn btn-secondary w-50"><i class="fa-solid fa-backward"></i> Top</a>
    </div>
    <div class="col">
      <a href="{{ route('books_favorites.index') }}" class="home btn btn-danger w-50"><i class="fa-solid fa-backward"></i> Favorites </a>
    </div>
  </div>

  <div class="text-center">
      
  </div>



</div>


@endsection
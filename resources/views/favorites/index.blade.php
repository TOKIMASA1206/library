@extends('layouts.app')


@section('title', 'Library');

@section('content')




<div class="container-fluid w-75">
  <div class=" table-title mt-5">
    Favorites
  </div>

  <div class="">
    <table class="table table-hover w-100 mx-auto text-center">
      <tbody>

          @forelse  ($favorites as $favorite)
              <tr class="">
                  <th class="text-center mt-3">{{ $favorite->book->id }}</th>
                  
                  <td class="mt-3"><a href="{{route('books.show', $favorite->book)}}">{{ $favorite->book->title }}</a>
                  </td>

                  <td>
                    <form action="{{route('books.favorite', $favorite->book)}}" method="POST" style="display: inline;">
                      @csrf
                      @method('POST')
                      <button type="submit" class="btn {{ $favorite->book->isFavorited() ? 'btn-danger' : 'btn-outline-danger' }}">
                        <i class="fa-regular fa-heart"></i><!-- ハートのアイコン -->
                        {{ $favorite->book->isFavorited() ? 'お気に入り解除' : 'お気に入りに追加' }}
                    </button>
                  </form>
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




  <div class="text-center">
      <a href="{{route('books.create')}}" class="home btn btn-secondary w-25"><i class="fa-solid fa-backward"></i> Top</a>
  </div>



</div>


@endsection
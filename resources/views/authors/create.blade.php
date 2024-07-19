@extends('layouts.app')


@section('title', 'Library');

@section('content')




<div class="container-fluid w-75">
  <div class=" table-title mt-5">
    Authors
  </div>

  <form action="{{route('authors.store')}}" method="post">
      @csrf
      <div class="row mb-3">
          <div class="col-10">
              <input type="text" name="author_name" class="form-control" placeholder="Add new author" required>
          </div>
          <div class="col-2">
              <button class="btn btn-success px-2 w-100"><i class="fa-solid fa-plus"></i>ADD</button>
          </div>
      </div>
  </form>

  <div class="">
      <table class="table table-hover w-100 mx-auto">

          <tbody>

              @forelse ($all_authors as $author)
                  <tr class="">
                      <th class="text-center mt-3">{{ $author->id }}</th>
                      <td class="mt-3">{{ $author->name }}

                      <a href="{{route('authors.show', $author)}}" class=" py-2 px-3 btn btn-danger float-end ms-2">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                      <a href="{{route('authors.edit', $author)}}" class="btn btn-warning py-2 px-3 float-end"><i
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




  <div class="text-center">
      <a href="{{ url('/') }}" class="home btn btn-secondary w-25"><i class="fa-solid fa-backward"></i> Top</a>
  </div>



</div>


@endsection
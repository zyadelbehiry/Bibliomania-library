@extends('layout')
@section('title')
    <title>{{ $book->title }}</title>
@endsection
@section('content')

                                {{-- book card --}}
    <div class="card  mb-3 mx-5 my-3" style="max-width: 38rem;">
        <div class="card-header text-center text-bg-dark ">
            <h2> {{ $book->title }} </h2>
        </div>
        <div class="card-body ">
            <h5><p class="card-text">{{ $book->description }}</p></h5>
            <h5>Book Categories : </h5>
            <ul>
                @foreach ($book->categories as $category)
                    <li>{{ $category->categoryName }}</li>
                @endforeach
            </ul>
        </div>
    </div>

                                {{-- button --}}

    @auth
        @if (Auth::user()->is_admin)
        <div class="vstack gap-2 col-md-5 mx-5">
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-dark rounded-pill">Update</a>
            <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger rounded-pill">Delete</a>
          </div>

        @endif
    @endauth


     {{-- comment area --}}
     <div class="text-dark mx-5 my-3">
     <h3>Comments</h3>
    </div>
    <div class="mx-5">
    @foreach ($book->comments as $comment)
        <div class="p-2 bg-dark opacity-75 text-light">{{ $comment->content }} </div>
        <br>
    @endforeach
    </div>

    <form action="{{ route('comments.store',$book->id) }}" method="post" >
        @csrf
    <div class="hstack gap-2 mb-5">
        <input class="form-control mx-5 border-dark " type="text" placeholder="Add your comment here..." name="content">
        <button type="submit" class="btn btn-dark">Submit</button>
        {{-- <div class="vr"></div>
        <button type="submit" class="btn btn-outline-danger">Reset</button> --}}
      </div>
    </form>
</div>
@endsection

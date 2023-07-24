@extends('layout')

@section('title')
<title>Home page</title>
@endsection
@section('content')
<div class="card text-bg-dark bg-opacity-75 mb-3 ms-auto me-auto my-5" style="max-width: 50rem;">
<div class="card-header text-center">
    <h1 ><p >All books</p></h1>
</div>
</div>
<div class="card text-bg-dark mb-3  ms-auto me-auto " style="max-width: 50rem;">
@foreach ($books as $book)
    <div class="card-header text-center">
            <a href="{{ route('books.show', $book->id) }}"class="link-light" >
                <h2>{{ $book->title }}</h2>
            </a>
        </div>
        <div class="card-body text-bg-light bg-opacity-75 text-center">
          <p class="card-text">{{ $book->description }}</p>
        </div>
        @endforeach
    </div>
@endsection
            {{-- <hr>
            <div>
                <a href="{{ route('books.show', $book->id) }}" >
                    <h2>{{ $book->title }}</h2>
                </a>
                <p>{{ $book->description }}</p>
            </div> --}}

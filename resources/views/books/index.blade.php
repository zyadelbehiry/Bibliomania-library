@extends('layout')

@section('content')
<h1>All books</h1>
@foreach ($books as $book)
    <hr>
    <div>
        <a href="{{ route('books.show', $book->id) }}" >
            <h2>{{ $book->title }}</h2>
        </a>
        <p>{{ $book->description }}</p>
    </div>
@endforeach
@endsection

@extends('layout')
@section('title')
    <title>edit Book {{ $book->id }}</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="POST" action="{{ route('books.update',$book->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="my-4 mb-3">
            <label class="form-label bg-dark rounded-pill text-light p-2">Book title</label>
            <input type="text" class="form-control border-dark " name="title" value="{{ $book->title }}">
        </div>
        <div class="my-4 mb-3">
            <label class="form-label bg-dark rounded-pill text-light p-2">Book description</label>
            <textarea class="form-control border-dark" rows="3" name="description" >{{ $book->description }}</textarea>
        </div>
        <div>
            <label class="form-label bg-dark rounded-pill text-light p-2">Image</label>
            <input class="form-control form-control border-dark" type="file" name="image" value="{{ $book->image }}">
          </div>
        <div class="my-4 ">
            <input type="submit" class="btn btn-dark px-4" value="Update">
        </div>
    </form>
@endsection


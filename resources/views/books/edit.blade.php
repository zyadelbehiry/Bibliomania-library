@extends('layout')
@section('title')
    <title>edit Book {{ $book->id }}</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="POST" action="{{ route('books.update',$book->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="my-4 mb-3">
            <label class="form-label">Book title</label>
            <input type="text" class="form-control" name="title" value="{{ $book->title }}">
        </div>
        <div class="my-4 mb-3">
            <label class="form-label">Book description</label>
            <textarea class="form-control" rows="3" name="description" >{{ $book->description }}</textarea>
        </div>
        <div>
            <label class="form-label">Image</label>
            <input class="form-control form-control" type="file" name="image">
          </div>
        <div class="my-4 ">
            <input type="submit" class="btn btn-primary px-4" value="Update">
        </div>
    </form>
@endsection


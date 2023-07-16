@extends('layout')
@section('title')
    <title>Create Book</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @include('inc.errors')
        @csrf
        <div class=" mb-3">
            <label class="form-label">Book title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>
        <div class=" mb-3">
            <label class="form-label">Book description</label>
            <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <div>
        <label class="form-label">Image</label>
        <input class="form-control form-control" type="file" name="image">
      </div>
        <div class="my-4 ">
            <input type="submit" class="btn btn-primary px-4" value="Create">
        </div>
    </form>
@endsection

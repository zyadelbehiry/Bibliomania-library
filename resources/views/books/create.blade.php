@extends('layout')
@section('title')
    <title>Create Book</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @include('inc.errors')
        @csrf
        <div class=" mb-3 mt-2" >
            <label class="form-label bg-dark rounded-pill text-light p-2">Book title</label>
            <input type="text" class="form-control border-dark " name="title" value="{{ old('title') }}">
        </div>
        <div class=" mb-3">
          <label class="form-label bg-dark rounded-pill text-light p-2">Book description</label>
            <textarea class="form-control border-dark" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label class="form-label bg-dark rounded-pill text-light p-2">Image</label>
        <input class="form-control form-control border-dark" type="file" name="image">
        </div>
        <h4 class="mt-3 d-inline-block bg-dark rounded-pill text-light p-2 ">Categories </h4>
        @foreach ($categories as $category )
        <div class="form-check my-2">
            <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}"  >
            <label class="form-check-label" >
              {{ $category->categoryName }}
            </label>
          </div>
        @endforeach
        <div class="my-4 ">
            <input type="submit" class="btn btn-dark px-4" value="Create">
        </div>
    </form>
@endsection

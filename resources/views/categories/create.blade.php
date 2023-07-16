@extends('layout')
@section('title')
    <title>Create Category</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @include('inc.errors')
        @csrf
        <div class=" mb-3">
            <label class="form-label">Category name</label>
            <input type="text" class="form-control" name="categoryName" value="{{ old('title') }}">
        </div>

        <div class="my-4 ">
            <input type="submit" class="btn btn-primary px-4" value="Create">
        </div>
    </form>
@endsection

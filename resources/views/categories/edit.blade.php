@extends('layout')
@section('title')
    <title>Edit {{ $category->categoryName }} Category</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="POST" action="{{ route('categories.update',$category->id) }}">
        @csrf
        <div class="my-4 mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="categoryName" value="{{ $category->categoryName }}">
        </div>

        <div class="my-4 ">
            <input type="submit" class="btn btn-primary px-4" value="Update">
        </div>
    </form>
@endsection


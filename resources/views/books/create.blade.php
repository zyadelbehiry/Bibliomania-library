@extends('layout')
@section('title')
    <title>Create Book</title>
@endsection
@section('content')
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="my-4 mx-4 mb-3">
            <label class="form-label">Book title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="my-4 mx-4 mb-3">
            <label class="form-label">Book description</label>
            <textarea class="form-control" rows="3" name="description"></textarea>
        </div>
        <div class="my-4 mx-4">
            <input type="submit" class="btn btn-primary px-4" value="Create">
        </div>
    </form>
@endsection

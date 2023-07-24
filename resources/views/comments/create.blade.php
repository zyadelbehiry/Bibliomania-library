@extends('layout')
@section('title')
<title>Comment on book {{ $book->id }}</title>
@endsection
@section('content')
<form action="{{ route('comments.store',$book->id) }}" method="post" >
    @csrf

    <div class=" mb-3">
        <label class="form-label">Add Comment</label>
        <input type="text" class="form-control" name="content" >
    </div>
</form>
@endsection

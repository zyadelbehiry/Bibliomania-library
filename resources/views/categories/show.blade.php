@extends('layout')
@section('title')
<title>{{ $category->categoryName }} category</title>
@endsection
@section('content')
<h1>Category is : {{ $category->categoryName }}</h1>
@auth
<a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary my-4">Update</a>
<a href="{{ route('categories.delete',$category->id) }}" class="btn btn-danger my-4">Delete</a>
@endauth
@endsection

@extends('layout')
@section('title')
<title>Categories</title>
@endsection
@section('content')
<h1>Book Categories </h1>   <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
@foreach ($categories as $category)
<hr>
   <a href="{{ route('categories.show',$category->id) }}"> <p>{{ $category->categoryName }}</p> </a>
@endforeach
@endsection

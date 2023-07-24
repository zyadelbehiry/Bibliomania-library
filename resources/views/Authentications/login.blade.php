@extends('layout')
@section('title')
    <title>Login</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}
<div class="my-2 bg-dark rounded-pill p-2 text-light text-center container"><h1 class="mb-3">Login</h1></div>
<div class="container">
    <form method="post" action="{{ route('auth.handleLogin') }}">
        @include('inc.errors')
        @csrf
        <div class=" mb-3">
          <h5>  <label class="form-label">Email</label></h5>
            <input type="email" class="form-control" name="email" value="{{ old('title') }}">
        </div>
        <div class=" mb-3">
            <h5><label class="form-label">Password</label></h5>
            <input type="password" class="form-control" name="password" value="{{ old('title') }}">
        </div>

        <div class="my-4 ">
            <input type="submit" class="btn btn-dark px-4 rounded-pill " value="Create">
        </div>
    </form>
</div>
@endsection

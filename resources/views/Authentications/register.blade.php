@extends('layout')
@section('title')
    <title> Register</title>
@endsection
@section('content')

@include('inc.errors') {{-- this for vlaidation i created it to avoid repeating the code --}}

    <form method="post" action="{{ route('auth.handleRegister') }}">
        @include('inc.errors')
        @csrf
        <div class=" mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
        </div>
        <div class=" mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('title') }}">
        </div>
        <div class=" mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('title') }}">
        </div>

        <div class="my-4 ">
            <input type="submit" class="btn btn-primary px-4" value="Create">
        </div>
    </form>
@endsection

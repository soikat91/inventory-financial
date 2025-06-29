@extends('layouts.app')

@section('content')
<h2>Register</h2>

@if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mt-2">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group mt-2">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group mt-2">
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <button class="btn btn-success mt-3">Register</button>
</form>
<a href="{{ route('login') }}" class="btn btn-link mt-2">Back to Login</a>
@endsection

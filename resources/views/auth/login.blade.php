@extends('layouts.app')

@section('content')
<h2>Login In Inventory</h2>

@if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group mt-2">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary mt-3">Login</button>
</form>
<a href="{{ route('register') }}" class="btn btn-link mt-2">Register</a>
@endsection

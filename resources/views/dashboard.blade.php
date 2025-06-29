@extends('layouts.app')

@section('content')
    <div class="container m-5">
        <h2>Welcome, {{ Auth::user()->name }} To Our Inventory</h2>     
    </div>
@endsection

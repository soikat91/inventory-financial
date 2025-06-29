
<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    @auth
        <a href="{{ url('/dashboard') }}">Home</a> |
        <a href="{{ route('products.index') }}">Products</a> |
        <a href="{{ route('sales.index') }}">Sales</a> |
        <a href="{{ route('reports.index') }}">Reports</a> |
        <a href="{{ route('logout') }}">Logout</a>
    @endauth

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->has('qty'))
        <div class="text-danger">{{ $errors->first('qty') }}</div>
    @endif

    @yield('content')
</body>
</html>


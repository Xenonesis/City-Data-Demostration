<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - City Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <nav class="mb-4">
        <a href="/" class="btn btn-outline-dark">Home</a>
        <a href="/about" class="btn btn-outline-dark">About</a>
        <a href="/cities" class="btn btn-outline-dark">Cities</a>
        <a href="/contact" class="btn btn-outline-dark">Contact</a>
    </nav>

    <div>
        @yield('content')
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books collection</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    @include('layouts.nav')
    <div class="container mx-auto py-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>

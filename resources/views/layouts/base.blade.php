<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books collection</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    @section('menu')
        <div style="margin: 15px 0;">
            <a href="/">Start</a>
            <a href="{{ route('books.index') }}">Książki</a>
            <a href="{{ route('authors.index') }}">Autorzy</a>
        </div>
        <hr>
    @show
    <div class="content">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>

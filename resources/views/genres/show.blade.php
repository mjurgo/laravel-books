@extends('layouts.base')

@section('content')
    <h1>Gatunek: {{ $genre->name }}</h1>
    <ul>
        @foreach ($genre->books as $book)
            <li><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
@endsection

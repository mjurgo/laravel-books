@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">Gatunek: {{ $genre->name }}</h1>
    <ul>
        @foreach ($genre->books as $book)
            <li class="my-2"><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
@endsection

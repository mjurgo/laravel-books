@extends('layouts.base')

@section('content')
    <h1>{{ $book->title }}</h1>
    <div>
        <a href="{{ route('books.edit', $book) }}">Edytuj</a>
    </div>
    <ul>
        <li>Autor: <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name() }}</a></li>
        <li>Liczba stron: {{ $book->length }}</li>
        <li>
            Gatunek:
            @foreach ($book->genres as $genre)
                <a href="{{ route('genres.show', $genre) }}">{{ $genre->name }}</a>                
            @endforeach
        </li>
    </ul>
    <p>{{ $book->description }}</p>
@endsection

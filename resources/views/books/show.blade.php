@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">{{ $book->title }}</h1>
    <div>
        <a href="{{ route('books.edit', $book) }}"><button class="bg-blue-500 rounded p-2 text-white">Edytuj</button></a>
    </div>
    <ul>
        <li class="my-2"><b>Autor:</b> <a href="{{ route('authors.show', $book->author) }}" class="text-blue-500 text-2xl">{{ $book->author->name() }}</a></li>
        <li class="my-2"><b>Liczba stron:</b> {{ $book->length }}</li>
        <li class="my-2">
            <b>Gatunek:</b>
            @foreach ($book->genres as $genre)
                <a href="{{ route('genres.show', $genre) }}" class="text-blue-500">{{ $genre->name }}</a>                
            @endforeach
        </li>
    </ul>
    <p class="my-4">{{ $book->description }}</p>
@endsection

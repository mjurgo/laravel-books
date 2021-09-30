@extends('layouts.base')

@section('content')
    <h1>{{ $author->name() }}</h1>
    <ul>
        <li>Urodzon(y/a): {{ $author->birthday }}</li>
    </ul>
    <p>{{ $author->biography }}</p>
    <h2>Książki</h2>
    <ul>
        @foreach ($author->books as $book)
            <li><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
@endsection

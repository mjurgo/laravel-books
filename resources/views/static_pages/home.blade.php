@extends('layouts.base')

@section('content')
    <h1>Hello, World!</h1>
    <h2>Recent books</h2>
    <ul>
        @foreach ($recentBooks as $book)
            <li>
                <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
                ({{ $book->author->name() }})
            </li>
        @endforeach
    </ul>
@endsection

@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">{{ $author->name() }}</h1>
    <ul>
        <li class="my-2"><b>Urodzon(y/a):</b> {{ $author->birthday }}</li>
    </ul>
    <p>{{ $author->biography }}</p>
    <div class="my-4">
        <h2 class="text-3xl">Książki</h2>
        <ul>
            @foreach ($author->books as $book)
                <li class="my-2"><a href="{{ route('books.show', $book) }}" class="text-blue-500">{{ $book->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection

@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">{{ $book->title }}</h1>
    <div>
        <a href="{{ route('books.edit', $book) }}"><button class="bg-blue-500 rounded p-2 text-white">Edytuj</button></a>
    </div>
    <div class="my-2">
        <b>Ocena użytkowników:</b> <span class="text-green-500 text-2xl">{{ $book->score() }}</span>
    </div>
    <div>
        <b>Twoja ocena:</b>
        <span class="text-green-500 text-2xl">
            @guest
                Zaloguj się, by ocenić.
            @else
                <form action="{{ $book->ratedByCurrentUser() ? route('ratings.update', $book->currentUserRating()->id) : route('ratings.store') }}" method="post">
                    @csrf
                    @if ($book->ratedByCurrentUser())
                        @method('PUT')
                    @endif
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="my-2">
                        <select name="rating">
                            @if (!$book->ratedByCurrentUser())
                                <option value="" selected disabled>Brak oceny</option>
                            @endif
                            @for ($i = 0; $i < 10; $i++)
                                <option value="{{ $i + 1 }}" {{ ($book->currentUserRating()->rating == $i + 1) ? 'selected' : '' }}>{{ $i + 1 }}</option>
                            @endfor
                        </select>
                        <input type="submit" value="Oceń" class="bg-blue-500 rounded p-2 text-white text-base">
                    </div>
                </form>
            @endguest
        </span>
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

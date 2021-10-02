@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">Hello, books!</h1>
    @include('shared.recent_books')
    @auth
        <h3 class="text-2xl text-center">Twoje ostatnie oceny</h3>
        <div class="grid grid-cols-5 gap-4 my-4">
            @foreach ($ratings as $rating)
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">
                            <a href="{{ route('books.show', $rating->book) }}">{{ ucfirst($rating->book->title) }}</a>
                        </div>
                        <div class="font-bold text-xl text-green-500">
                            {{ $rating->rating }}
                        </div>
                        <p class="text-gray-700 text-base">
                            {{ Str::limit($rating->book->description, 150, $end='...') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endauth
@endsection

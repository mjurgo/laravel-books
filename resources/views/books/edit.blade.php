@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">Edytuj książkę</h1>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="w-full max-w-md mx-auto my-4">
        <form action="/books/{{ $book->id }}" method="POST">
            @csrf
            @method('put')
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Tytuł</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" value="{{ old('title') ?? $book->title }}">
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Autor</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="author">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ ($author->id == $book->author_id) ? 'selected' : '' }}>{{ $author->name() }}</option>
                    @endforeach
                </select>
                {{-- <input name="author" type="text" value="{{ old('author') ?? $book->author }}"> --}}
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="length">Liczba stron</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="length" value="{{ old('length') ?? $book->length }}">
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Opis</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="" cols="30" rows="10">{{ old('description') ?? $book->description }}</textarea>
            </div>
            <div class="my-2">
                @foreach ($genres as $genre)
                    <input class="shadow appearance-none border rounded my-2" type="checkbox" name="genres[]" value={{ $genre->id }} {{ ($book->genres->contains($genre)) ? 'checked' : '' }}> {{ $genre->name }}
                @endforeach
            </div>
            <button type="submit" class="bg-blue-500 rounded p-2 text-white">Edytuj</button>
        </form>
    </div>
@endsection

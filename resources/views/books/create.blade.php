@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">Dodaj książkę</h1>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="w-full max-w-md mx-auto my-2">
        <form action="/books" method="post">
            @csrf
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Tytuł</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" value="{{ old('title') }}">
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Autor</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="author" id="">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="length">Liczba stron</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="length" id="" value="{{ old('length') }}">
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Opis</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            <div class="my-2">
                @foreach ($genres as $genre)
                    <input class="shadow appearance-none border rounded my-2" type="checkbox" name="genres[]" value={{ $genre->id }}> {{ $genre->name }}
                @endforeach
            </div>
            <button type="submit" class="bg-blue-500 rounded p-2 text-white">Dodaj</button>
        </form>
    </div>
@endsection

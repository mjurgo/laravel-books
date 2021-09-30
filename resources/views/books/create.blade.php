@extends('layouts.base')

@section('content')
    <h1>Dodaj książkę</h1>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form action="/books" method="post">
        @csrf
        <div>
            <label for="title">Tytuł</label>
            <input name="title" type="text" value="{{ old('title') }}">
        </div>
        <div>
            <label for="author">Autor</label>
            <select name="author" id="">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name() }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="length">Liczba stron</label>
            <input type="number" name="length" id="" value="{{ old('length') }}">
        </div>
        <div>
            <label for="description">Opis</label>
            <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>
        <div>
            @foreach ($genres as $genre)
            <input type="checkbox" name="genres[]" value={{ $genre->id }}> {{ $genre->name }}
            @endforeach
        </div>
        <button type="submit">Dodaj</button>
    </form>
@endsection

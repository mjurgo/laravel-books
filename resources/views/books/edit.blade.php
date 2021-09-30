@extends('layouts.base')

@section('content')
    <h1>Edytuj książkę</h1>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form action="/books/{{ $book->id }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="title">Tytuł</label>
            <input name="title" type="text" value="{{ old('title') ?? $book->title }}">
        </div>
        <div>
            <label for="author">Autor</label>
            <select name="author">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ ($author->id == $book->author_id) ? 'selected' : '' }}>{{ $author->name() }}</option>
                @endforeach
            </select>
            {{-- <input name="author" type="text" value="{{ old('author') ?? $book->author }}"> --}}
        </div>
        <div>
            <label for="length">Liczba stron</label>
            <input type="number" name="length" value="{{ old('length') ?? $book->length }}">
        </div>
        <div>
            <label for="description">Opis</label>
            <textarea name="description" id="" cols="30" rows="10">{{ old('description') ?? $book->description }}</textarea>
        </div>
        <button type="submit">Edytuj</button>
    </form>
@endsection

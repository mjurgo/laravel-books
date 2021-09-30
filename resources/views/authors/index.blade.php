@extends('layouts.base')

@section('content')
    <h1>Autorzy</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
            <th></th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $author->firstname }}</td>
                <td>{{ $author->lastname }}</td>
                <td>{{ $author->birthday }}</td>
                <td><a href="{{ route('authors.show', $author) }}">Profil</a></td>
            </tr>
        @endforeach
@endsection

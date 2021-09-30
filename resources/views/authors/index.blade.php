@extends('layouts.base')

@section('content')
<h1 class="text-4xl text-center">Autorzy</h1>
<div class="w-fill my-4">
    <table class="w-full p-2">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2">#</th>
                <th class="p-2">Imię</th>
                <th class="p-2">Nazwisko</th>
                <th class="p-2">Data urodzenia</th>
                <th class="p-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->firstname }}</td>
                    <td>{{ $author->lastname }}</td>
                    <td>{{ $author->birthday }}</td>
                    <td><a href="{{ route('authors.show', $author) }}"><button class="bg-blue-500 rounded p-1 text-white">Profil</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

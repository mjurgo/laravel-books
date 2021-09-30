@extends('layouts.base')

@section('content')
<h1 class="text-4xl text-center">Książki</h1>
<div>
    <a href="{{ route('books.create') }}"><button class="bg-blue-500 rounded p-2 text-white">Dodaj książkę</button></a>
</div>
<div class="w-fill my-4">
    <table class="w-full p-2">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2">id</th>
                <th class="p-2">Tytuł</th>
                <th class="p-2">Autor</th>
                <th class="p-2"></th>
                <th class="p-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="text-center">
                    <td>{{ $book->id }}</td>
                    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
                    <td><a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name() }}</a></td>
                    <td><a href="{{ route('books.edit', $book->id) }}"><button class="bg-blue-500 rounded p-1 text-white">Edytuj</button></a></td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 rounded p-1 text-white">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{ $books->links() }}
</div>
@endsection

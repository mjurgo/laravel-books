@extends('layouts.base')

@section('content')
<h1>Książki</h1>
<div>
    <a href="{{ route('books.create') }}">Dodaj książkę</a>
</div>
<table>
    <tr>
        <th>id</th>
        <th>Tytuł</th>
        <th>Autor</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td><a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name() }}</a></td>
            <td><a href="{{ route('books.show', $book->id) }}">szczegóły</a></td>
            <td><a href="{{ route('books.edit', $book->id) }}">edytuj</a></td>
            <td>
                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Usuń">
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $books->links() }}
@endsection

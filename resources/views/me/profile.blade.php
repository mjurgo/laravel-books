@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">{{ $user->name }}</h1>
    <ul>
        <li class="my-2">Nazwa: {{ $user->name }}</li>
        <li class="my-2">Email: {{ $user->email }}</li>
    </ul>
    <a href="{{ route('me.edit') }}"><button class="bg-blue-500 rounded p-1 text-white">Edytuj</button></a>
@endsection

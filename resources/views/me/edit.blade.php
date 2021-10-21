@extends('layouts.base')

@section('content')
    <h1 class="text-4xl text-center">Edytuj profil</h1>
    @if ($errors->any())
        <ul>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                @foreach ($errors->all() as $error)
                        <li><span class="block sm:inline">{{ $error }}</span></li>
                @endforeach
            </div>
        </ul>
    @endif
    <div class="w-full max-w-md mx-auto my-4">
        <form action="{{ route('me.update') }}" method="POST">
            @csrf
            @method('put')
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nazwa</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" value="{{ old('name', $user->name) }}">
            </div>
            <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" value="{{ old('email', $user->email) }}">
            </div>
            {{-- <div class="my-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Hasło</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" value="{{ old('password') ?? $user->password }}">
            </div> --}}
            <button type="submit" class="bg-blue-500 rounded p-2 text-white">Edytuj</button>
        </form>
    </div>
@endsection

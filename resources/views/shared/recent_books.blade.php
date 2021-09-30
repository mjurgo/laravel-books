<div id="recent-books" class="my-4">
    <h3 class="text-2xl text-center">Recent books</h2>
    <div class="grid grid-cols-5 gap-4 my-4">
        @foreach ($recentBooks as $book)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        <a href="{{ route('books.show', $book) }}">{{ $book->title }}</a>
                    </div>
                    <p class="text-lg"><a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name() }}</a></p>
                    <p class="text-gray-700 text-base">
                        {{ Str::limit($book->description, 150, $end='...') }}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    @foreach ($book->genres as $genre)
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            <a href="{{ route('genres.show', $genre)}}">{{ $genre->name }}</a>
                        </span>                        
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
    

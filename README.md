# Laravel app - books

Application inspired by sites such as lubimyczytac.pl and goodreads.com.
At the moment it allows users to register/login, add new books to database, modify them, delete and rate.
Books are in relations with authors and genres.

## Current agenda

- 

## TODO

- Authorize users.
- Create admin panel.
- Add search panel with laravel livewire.
- Refactor ratings. Maybe move rating download to user model? It would make more sense to do User->bookRating($book->id) than $book->currentUserRating. Maybe.
- Validate rating input.
- Connect to allegro api to show book offers.
- Add book reviews.

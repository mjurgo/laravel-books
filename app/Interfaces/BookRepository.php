<?php

namespace App\Interfaces;

interface BookRepository
{
    public function allPaginated($perPage);
    public function get($id);
    public function filterBy(?string $phrase, int $perPage);
}

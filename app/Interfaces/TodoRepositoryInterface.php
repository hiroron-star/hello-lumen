<?php

namespace App\Interfaces;

use App\Entities\Todo;

interface TodoRepositoryInterface
{
    public function create(array $data): Todo;
    // あとで find, update, delete も追加できる
}

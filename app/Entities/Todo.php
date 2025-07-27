<?php

namespace App\Entities;

class Todo
{
    public int $id;
    public string $title;
    public ?string $description;
    public bool $completed;

    public function __construct($id, $title, $description, $completed)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->completed= $completed;
    }
}

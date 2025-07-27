<?php

namespace App\Entities;

class Todo
{
    public int $id;
    public string $title;
    public ?string $description;
    public bool $is_done;

    public function __construct($id, $title, $description, $is_done)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->is_done = $is_done;
    }
}

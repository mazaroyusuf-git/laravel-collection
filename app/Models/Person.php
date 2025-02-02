<?php

namespace App\Models;

class Person
{
    public function __construct(public string $name)
    {
        $this->name = $name;
    }
}
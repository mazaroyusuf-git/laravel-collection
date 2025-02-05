<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChunkedTest extends TestCase
{
    //Chunked adalah operasi untuk memotong collection menjadi beberapa collection, kita bisa gunakan
    //chunk(number) Potong collection menjadi beberapa collection
    public function testChunked()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->chunk(3);

        self::assertEqualsCanonicalizing([1, 2, 3], $result->all()[0]->all());
        self::assertEqualsCanonicalizing([4, 5, 6], $result->all()[1]->all());
        self::assertEqualsCanonicalizing([7, 8, 9], $result->all()[2]->all());
    }
}

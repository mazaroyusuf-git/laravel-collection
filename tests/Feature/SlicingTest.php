<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SlicingTest extends TestCase
{
    //Slicing adalah operasi mengambil sebagian data di collection, kita bisa gunakan method slice(start) dan slice(start, length)
    public function testSlice()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->slice(3);
        self::assertEqualsCanonicalizing([4, 5, 6, 7, 8, 9], $result->all());

        $result = $collection->slice(3, 2);
        self::assertEqualsCanonicalizing([4, 5], $result->all());
    }
}

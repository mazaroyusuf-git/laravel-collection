<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RandomTest extends TestCase
{
    //Random adalah operasi mengambil data acak di Collection
    //random() mengambil satu data random
    //random(total) mengambil data random sejumlah total
    public function testRandom()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->random();

        self::assertTrue(in_array($result, [1, 2, 3, 4, 5, 6, 7, 8, 9]));
    }
}

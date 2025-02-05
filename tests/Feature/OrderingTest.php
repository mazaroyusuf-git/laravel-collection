<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderingTest extends TestCase
{
    //Ordering adalah operasi pengurutan data collection, method nya bisa lihat di chapter 134
    public function testOrdering()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->sort();
        self::assertEqualsCanonicalizing([1, 2, 3, 4, 5, 6, 7, 8, 9], $result->all());

        $result = $collection->sortDesc();
        self::assertEqualsCanonicalizing([9, 8, 7, 6, 5, 4, 3, 2, 1], $result->all());
    }

}

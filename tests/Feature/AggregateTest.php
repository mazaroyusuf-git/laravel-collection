<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AggregateTest extends TestCase
{
    //Laravel Collection juga mendukung aggregasi seperti method min(), max(), avg(), sum(), dan count()
    public function testAggregate()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->sum();
        self::assertEquals(45, $result);

        $result = $collection->avg();
        self::assertEquals(5, $result);

        $result = $collection->min();
        self::assertEquals(1, $result);

        $result = $collection->max();
        self::assertEquals(9, $result);
    }
}

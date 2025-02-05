<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetriveTest extends TestCase
{
    //Retrive adalah operasi mengambil data di collection,
    //first() mengambil data pertama di collection, jika tidak ada maka null,
    //firstOrFail() mengambil data pertama di collection, atau error itemNotFoundException jika tidak ada
    //first(function) mengambil data pertama di collection yang sesuia dengan kondisi function menghasilkan true
    //firstWhere(key, value) mengambil data pertama di collection dimana key sama dengan value

    public function testFirst()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->first();
        self::assertEquals(1, $result);

        $result = $collection->first(function ($value, $key) {
            return $value > 5;
        });
        self::assertEquals(6, $result);
    }

    //dan juga ada last, mengambil data dari terakhir
    //last() mengambil data terakhir di collection
    //last(function) mengambil data terakhir di collection yang sesuia dengan kondisi function menghasilkan true
    public function testLast()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->last();
        self::assertEquals(9, $result);

        $result = $collection->last(function ($value, $key) {
            return $value < 5;
        });
        self::assertEquals(4, $result);
    }
}

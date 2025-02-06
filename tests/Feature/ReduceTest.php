<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReduceTest extends TestCase
{
    //Collection juga punya operasi reducer, yang berguna sebagai mengiterasi tiap data dan memodifikasi satu persatu
    //dan akan mengembalikan data terus menerus tiap iterasi nya, tiap hasil iterasi akan digunakan di iterasi selanjutnya
    //kita bisa gunakan method reduce(function(hasilSebelumnya, item))
    public function testReduce()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->reduce(function($carry, $item) {
            return $carry + $item;
        });
        self::assertEquals(45, $result);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZippingTest extends TestCase
{
    //Zipping adalah operasi collection yang menggabungkan array atau collection lain

    //zip(collection/array) berguna untuk menggabungkan tiap item di collection menjadi collection baru
    //akan digabungkan sesuai index yang sama
    public function testZip()
    {
        $collection1 = collect([1, 2, 3]);
        $collection2 = collect([4, 5, 6]);
        $collection3 = $collection1->zip($collection2);

        self::assertEquals([
            collect([1, 4]),
            collect([2, 5]),
            collect([3, 6])
        ], $collection3->all());
    }

    //concat(collection/array) berguna untuk menggabungkan 2 collection
    public function testConcat()
    {
        $collection1 = collect([1, 2, 3]);
        $collection2 = collect([4, 5, 6]);
        $collection3 = $collection1->concat($collection2);

        self::assertEquals([1, 2, 3, 4, 5, 6], $collection3->all());
    }

    //combine(collection/array) berguna untuk menjadikan collection pertama sebagai key dan collection kedua jadi value nya
    public function testCombine()
    {
        $collection1 = collect(["name", "country"]);
        $collection2 = collect(["mazaro", "indonesia"]);
        $collection3 = $collection1->combine($collection2);

        self::assertEquals([
            "name" => "mazaro",
            "country" => "indonesia"
        ], $collection3->all());
    }
}

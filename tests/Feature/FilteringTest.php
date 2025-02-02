<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilteringTest extends TestCase
{
    //Filtering adalah operasi menfilter collection jika nilai true akan diambil jika false akan dibuang, hati2 ketika
    //mengunakan data array dengan index number karena data array akan dihapus sehingga index akan hilang di collection baru
    //setelah filter

    //filter() berguna untuk iterasi tiap data, dikirim ke function, jika nilai true akan diambil jika false akan dibuang.
    public function testFiltering()
    {
        $collection = collect([
            "Yusuf" => 50,
            "Mazaro" => 80,
            "Gunardiawan" => 100
        ]);

        $result = $collection->filter(function ($item, $key) {
            return $item >= 75;
        });

        self::assertEquals([
            "Mazaro" => 80,
            "Gunardiawan" => 100
        ], $result->all());
    }

    //lalu ada yang nama nya Partitioning sama seperti filter namun data yang false tidak dibuang melainkan dibuat
    //collection lagi, kita bisa gunakan method partition
    public function testPartition()
    {
        $collection = collect([
            "Yusuf" => 50,
            "Mazaro" => 80,
            "Gunardiawan" => 100
        ]);

        [$result1, $result2] = $collection->partition(function ($item, $key) {
            return $item >= 75;
        });

        self::assertEquals([
            "Mazaro" => 80,
            "Gunardiawan" => 100
        ], $result1->all());
        self::assertEquals([
            "Yusuf" => 50
        ], $result2->all());
    }
}

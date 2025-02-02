<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlatteningTest extends TestCase
{
    //flattening adalah operasi collection yang berguna untuk transformasi nested collection menjadi flat

    //collapse() berguna untuk mengubah tiap array di item collection menjadi flat collection
    public function testCollapse()
    {
        $collection = collect([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $result = $collection->collapse();
        self::assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9], $result->all());
    }

    //flatMap() berguna untuk iterasi tiap data lalu dikirim ke function yg menghasilkan collection dan diubah jadi flat collection
    public function testMapFlat()
    {
        $collection = collect([
            [
                "name" => "yusuf",
                "hobbies" => ["Coding", "Gaming"]
            ],
            [
                "name" => "azam",
                "hobbies" => ["Reading", "Writing"]
            ]
        ]);

        $hobbies = $collection->flatMap(function ($item) {
            return $item["hobbies"];
        });

        self::assertEquals(["Coding", "Gaming", "Reading", "Writing"], $hobbies->all());
    }
}

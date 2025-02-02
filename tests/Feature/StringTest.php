<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StringTest extends TestCase
{
    //String Operation adalah operasi transformasi collection menjadi string

    //join(glue = ", finalGlue = ") berguna untuk mengubah tiap item menajdi string dengan menggabungkan dengan separator glue,
    //dan separator akhir dengan finalGlue
    public function testJoin()
    {
        $collection = collect(["Mazaro", "Yusuf", "Gunardiawan"]);

        self::assertEquals("Mazaro-Yusuf-Gunardiawan", $collection->join("-"));
        self::assertEquals("Mazaro-Yusuf_Gunardiawan", $collection->join("-", "_"));
    }
}

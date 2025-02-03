<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestingTest extends TestCase
{
    //Testing adalah operasi collection untuk mengecek isi data di collection, testing mengembalikan nilai boolean
    //testing punya beberapa method : 
    //has(array) apakah collection punya semua key, 
    //hasAny(array) apakah collection punya salah satu key, 
    //contains(value) apakah collection punya value,
    //contains(key, value) apakah collection punya key dan value, 
    //contains(function) akan mengiterasi semua data dan cek apakah salah satu data menghasilkan true

    public function testTesting()
    {
        $collection = collect(["mazaro", "yusuf", "mazaro"]);
        self::assertTrue($collection->contains("yusuf"));
        self::assertTrue($collection->contains(function ($value, $key) {
            return $value == "yusuf";
        }));
    }
}

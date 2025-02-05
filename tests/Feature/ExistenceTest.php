<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExistenceTest extends TestCase
{
    //Checking Existense adalah untuk mengecek apakah data yang di cari ada di collection,
    //isEmpty() : bool adalah untuk mengecek collection kosong
    //isNotEmpty() kebalikan nya
    //contains(value) mengecek apakah value ini ada
    //contains(function) mengcek collection memiliki value dengan kondisi function bernilai true
    //containsOneItem() mengecek collection hanya memiliki satu data

    public function testExcistence() {
      $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
      self::assertTrue($collection->isNotEmpty());
      self::assertFalse($collection->isEmpty());
      self::assertTrue($collection->contains(8));
      self::assertFalse($collection->contains(10));
      self::assertTrue($collection->contains(function ($value, $item) {
        return $value == 8;      
    }));
    } 
}

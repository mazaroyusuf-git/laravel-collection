<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\LazyCollection;
use Tests\TestCase;

class LazyTest extends TestCase
{
    //kita juga bisa membuat lazy collection data nya akan di pakai saat hanya dibutuhkan saja, cocok untuk data yang besar, berikut
    //method2 nya : 
    //https://laravel.com/api/10.x/Illuminate/Support/LazyCollection.html 

    public function testLazy()
    {
        $collection = LazyCollection::make(function () {
            $value = 0;
            while (true) {
                yield $value;
                $value++;
            }
        });

        $result = $collection->take(10);
        self::assertEqualsCanonicalizing([0, 1, 2, 3, 4, 5, 6, 7, 8 , 9], $result->all());
    }

}

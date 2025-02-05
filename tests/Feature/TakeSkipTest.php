<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use LDAP\Result;
use Tests\TestCase;

class TakeSkipTest extends TestCase
{
    //selain slice untuk mengambil sebagian element kita juga bisa pakai take and skip, method nya ada :
    //take(length) berguna untuk mengambil data dari awal sepanjang length jika length negative maka proses mengambil dari belakang
    //takeUntil(function) mengiterasi tiap data, mengambil nya sampai function mengembalikan nilai true
    //takeWhile(function) mengiterasi tiap data, mengambil nya sampai function mengembalikan nilai false

    public function testTake()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $result = $collection->take(3);
        self::assertEqualsCanonicalizing([1, 2, 3], $result->all());

        $result = $collection->takeUntil(function ($value, $key) {
            return $value == 3;
        });
        self::assertEqualsCanonicalizing([1, 2], $result->all());

        $result = $collection->takeWhile(function ($value, $key) {
            return $value < 3;
        });
        self::assertEqualsCanonicalizing([1, 2], $result->all());
    }
    //takeUntil dan takeWhile akan berhenti setelah kondisi nya terpenuhi

    //Skip akan menghiraukan data tertentu dan akan mengambil semua data, method nya :
    //skip(length) ambil seluruh data kecuali sejumlah length data diawal,
    //skipUntil(function) iterasi tiap data, jangan ambil tiap data sampai function mengembalikan true.
    //skipWhile(function) iterasi tiap data, jangan ambil tiap data sampai function mengembalikan false
    public function testSkip()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->skip(3);
        self::assertEqualsCanonicalizing([4, 5, 6, 7, 8, 9], $result->all());

        $result = $collection->skipUntil(function ($value, $key) {
            return $value == 3;
        });
        self::assertEqualsCanonicalizing([3, 4, 5, 6, 7, 8, 9], $result->all());

        $result = $collection->skipWhile(function ($value, $key) {
            return $value < 3;
        });
        self::assertEqualsCanonicalizing([3, 4, 5, 6, 7, 8, 9], $result->all());
    }
}

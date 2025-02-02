<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    //Collection adalah class struktur data seperti pada java, yang memudahkan kita memanipulasi data di array, kita bisa lihat di
    //https://laravel.com/api/10.x/Illuminate/Support/Collection.html 

    //untuk membuat collection kita bisa menggunakan global function collect(array) pada Collection
    public function testCreateCollection()
    {
        $collection = collect([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $collection->all()); //all() untuk mendapatkan semua element pada collection
    }

    //Collection adalah turunan dari Iterable maka dari itu kita bisa melakukan iterasi pada data collection
    public function testForEach()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        foreach ($collection as $key => $value) {
            self::assertEquals($key + 1, $value);
        }
    }

    //Collection adalah sebuah class, maka dari itu jika kita ingin memanipulasi datanya kita perlu menggunakan method2
    //yang ada dalam class tersebut, seperti push(data), pop(), prepend(data), pull(key), put(key,data), penjelasan nya
    //ada di chapter 119
    public function testCrud()
    {
        $collection = collect([]);
        $collection->push(1, 2, 3);
        self::assertEqualsCanonicalizing([1, 2 ,3], $collection->all());

        $result = $collection->pop();
        self::assertEquals(3, $result);
        self::assertEqualsCanonicalizing([1, 2], $collection->all());
    }

    //kita juga bisa melakukan mapping pada data collection yaitu mentransformasi menjadi data lain
    //mapping butuh function sebagai parameter untuk perubahan data nya, urutan hasil nya sama seperti urutan semula
    //kita bisa gunakan method map(function), mapInto(class), mapSpread(function), mapToGroups(function), detail nya bisa
    //lihat di chapter 120

    //map() berguna untuk mengiterasi seluruh data dan memanipulasi nya dengan function di parameter nya, jgn lupa buat
    //variable di function nya untuk representasi dari data collectionnya
    public function testMap()
    {
        $collection = collect([1, 2, 3]);
        $result = $collection->map(function ($item) {
            return $item * 2;
        });
        self::assertEquals([2, 4, 6], $result->all());
    }

    //mapInto() berguna untuk mengiterasi seluruh data dan memasukkan data tersebut ke class yang sudah ditentukan
    public function testMapInto()
    {
        $collection = collect(["yusuf"]);
        $result = $collection->mapInto(Person::class);
        $this->assertEquals([new Person("yusuf")], $result->all());
    }

    //mapSpread() akan mengambil data dari collection dan menjadikan nya parameter di function mapSpread(), jangan
    //lupa tambahkan di function nya representasi dari value si data collection
    public function testMapSpread()
    {
        $collection = collect([["yusuf", "azam"], ["mazaro", "yusuf"]]);
        $result = $collection->mapSpread(function ($firstname, $lastname) {
            $fullname = $firstname . " " . $lastname;
            return new Person($fullname);
        });
        self::assertEquals([
            new Person("yusuf azam"),
            new Person("mazaro yusuf")
        ], $result->all());
    }

    //mapToGroups() berguna untuk menggruping data dalam collection yang mempunyai value yang sama dan otomatis
    //mapToGroups() akan otomatis mengabungkan nya jadi satu, lalu return value nya buat jadi Category => Value
    public function testMapToGroups()
    {
        $collection = collect([
            [
                "name" => "mazaro",
                "department" => "IT"
            ],
            [
                "name" => "yusuf",
                "department" => "HR"
            ],
            [
                "name" => "gunardiawan",
                "department" => "IT"
            ]
        ]);

        $result = $collection->mapToGroups(function ($item) {
            return [$item["department"] => $item["name"]];
        });
        self::assertEquals([
            "IT" => collect(["mazaro", "gunardiawan"]),
            "HR" => collect(["yusuf"])
        ], $result->all());
    }
}

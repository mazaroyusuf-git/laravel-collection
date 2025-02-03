<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupingTest extends TestCase
{
    //Grouping adalah operasi collection yang berguna untuk menggrupkan element2 yang ada di collection
    public function testGroup()
    {
        $collection = collect([
            [
                "name" => "yusuf",
                "dept" => "HR"
            ],
            [
                "name" => "mazaro",
                "dept" => "IT"
            ],
            [
                "name" => "gunardiawan",
                "dept" => "HR"
            ]
        ]);
        $result = $collection->groupBy("dept");
        self::assertEquals([
            "HR" => collect([
                [
                    "name" => "yusuf",
                    "dept" => "HR"
                ],
                [
                    "name" => "gunardiawan",
                    "dept" => "HR"
                ]
            ]),
            "IT" => collect([
                [
                    "name" => "mazaro",
                    "dept" => "IT"
                ]
            ])
        ], $result->all());
        self::assertEquals([
            "HR" => collect([
                [
                    "name" => "yusuf",
                    "dept" => "HR"
                ],
                [
                    "name" => "gunardiawan",
                    "dept" => "HR"
                ]
            ]),
            "IT" => collect([
                [
                    "name" => "mazaro",
                    "dept" => "IT"
                ]
            ])
        ], $collection->groupBy(function ($value, $key) {
            return $value["dept"];
        })->all());
    }
}

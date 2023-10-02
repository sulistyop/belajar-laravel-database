<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class QueryBuilderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        DB::delete('delete from categories');
    }

    public function testInsert()
    {
        DB::table('categories')->insert([
           "id" => "GADGET",
           "name" => "Gadget"
        ]);
        DB::table('categories')->insert([
            "id" => "FOOD",
            "name" => "Food"
        ]);

        $results = DB::select("select count(id) as total from categories");
        self::assertEquals(2, $results[0]->total);
    }


}

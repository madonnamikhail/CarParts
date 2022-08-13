<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $cities = array(
            array('id' => '1','name' => '{"ar":"القاهرة","en":"Cairo"}','status' => '1','created_at' => '2022-06-23 12:43:18','updated_at' => '2022-06-23 12:43:18'),
            array('id' => '2','name' => '{"ar":"بنها","en":"Benha"}','status' => '1','created_at' => '2022-06-23 12:43:36','updated_at' => '2022-06-23 12:43:36'),
            array('id' => '3','name' => '{"ar":"الجيزة","en":"Giza"}','status' => '1','created_at' => '2022-06-23 12:43:58','updated_at' => '2022-06-23 12:43:58'),
            array('id' => '4','name' => '{"ar":"الاقصر","en":"Luxor"}','status' => '1','created_at' => '2022-06-23 12:44:27','updated_at' => '2022-06-23 12:44:27'),
            array('id' => '5','name' => '{"ar":"اسوان","en":"Aswan"}','status' => '0','created_at' => '2022-06-23 12:44:39','updated_at' => '2022-06-23 12:44:39')
          );
        City::insert($cities);

    }
}

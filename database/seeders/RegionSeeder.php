<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $regions = array(
            array('id' => '1','name' => '{"en":"velal","ar":"الفلل"}','status' => '1','slug' => '{"en":"velal","ar":"الفلل"}','latitude' => '2.20','longitude' => '5.60','raduis' => '4.600','city_id' => '2','created_at' => '2022-06-23 12:45:34','updated_at' => '2022-06-23 12:45:34'),
            array('id' => '2','name' => '{"en":"Naser city","ar":"مدينة نصر"}','status' => '0','slug' => '{"en":"naser-city","ar":"مدينة-نصر"}','latitude' => '2.30','longitude' => '5.30','raduis' => '2.600','city_id' => '1','created_at' => '2022-06-23 12:46:33','updated_at' => '2022-06-23 12:46:33')
        );
        Region::insert($regions);


    }
}

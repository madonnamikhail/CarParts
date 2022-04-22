<?php

namespace Database\Seeders;

use App\Models\Models;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $models = array(
            array('id' => '1','name' => '{"en":"Sportage","ar":"سبرتاج"}','year' => '2021','status' => '1','brand_id' => '12','created_at' => '2022-04-16 13:40:27','updated_at' => '2022-04-16 13:40:27','slug' => '{"en":"sportage","ar":"سبرتاج"}'),
            array('id' => '2','name' => '{"en":"Seltos","ar":"سيلتوس"}','year' => '2020','status' => '0','brand_id' => '12','created_at' => '2022-04-16 13:41:14','updated_at' => '2022-04-16 13:41:14','slug' => '{"en":"seltos","ar":"سيلتوس"}'),
            array('id' => '3','name' => '{"en":"Niro","ar":"نيرو"}','year' => '2022','status' => '0','brand_id' => '12','created_at' => '2022-04-16 13:42:01','updated_at' => '2022-04-16 13:42:01','slug' => '{"en":"niro","ar":"نيرو"}'),
            array('id' => '4','name' => '{"en":"Civic","ar":"سيفيك"}','year' => '2020','status' => '0','brand_id' => '13','created_at' => '2022-04-16 13:43:50','updated_at' => '2022-04-16 13:43:50','slug' => '{"en":"civic","ar":"سيفيك"}'),
            array('id' => '5','name' => '{"en":"Accord","ar":"اكورد"}','year' => '2021','status' => '0','brand_id' => '13','created_at' => '2022-04-16 13:44:35','updated_at' => '2022-04-16 13:44:35','slug' => '{"en":"accord","ar":"اكورد"}'),
            array('id' => '6','name' => '{"en":"MG5","ar":"ام-جي5"}','year' => '2021','status' => '1','brand_id' => '9','created_at' => '2022-04-16 13:45:37','updated_at' => '2022-04-16 13:45:37','slug' => '{"en":"mg5","ar":"ام-جي5"}'),
            array('id' => '7','name' => '{"en":"Zs","ar":"زيد اس"}','year' => '2020','status' => '1','brand_id' => '9','created_at' => '2022-04-16 13:46:50','updated_at' => '2022-04-16 13:46:50','slug' => '{"en":"zs","ar":"زيد-اس"}'),
            array('id' => '8','name' => '{"en":"x6","ar":"اكس6"}','year' => '2022','status' => '1','brand_id' => '11','created_at' => '2022-04-16 13:48:44','updated_at' => '2022-04-16 13:48:44','slug' => '{"en":"x6","ar":"اكس6"}'),
            array('id' => '9','name' => '{"en":"x3","ar":"اكس3"}','year' => '2022','status' => '0','brand_id' => '11','created_at' => '2022-04-16 13:49:01','updated_at' => '2022-04-16 13:49:01','slug' => '{"en":"x3","ar":"اكس3"}'),
            array('id' => '10','name' => '{"en":"2 series","ar":"2سيريوس"}','year' => '2020','status' => '0','brand_id' => '11','created_at' => '2022-04-16 13:49:52','updated_at' => '2022-04-16 13:49:52','slug' => '{"en":"2-series","ar":"2سيريوس"}'),
            array('id' => '11','name' => '{"en":"Wrang","ar":"ورانج"}','year' => '2020','status' => '1','brand_id' => '10','created_at' => '2022-04-16 13:53:01','updated_at' => '2022-04-16 13:53:01','slug' => '{"en":"wrang","ar":"ورانج"}')
          );
        Models::insert($models);
    }
}

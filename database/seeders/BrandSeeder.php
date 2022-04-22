<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands = array(
            array('id' => '9','name' => '{"en":"MG","ar":"ام-جي"}','slug' => '{"en":"mg","ar":"ام-جي"}','status' => '1','created_at' => '2022-04-16 13:26:18','updated_at' => '2022-04-16 13:26:18'),
            array('id' => '10','name' => '{"en":"JEEP","ar":"جيب"}','slug' => '{"en":"jeep","ar":"جيب"}','status' => '1','created_at' => '2022-04-16 13:26:35','updated_at' => '2022-04-16 13:26:35'),
            array('id' => '11','name' => '{"en":"BMW","ar":"بي ام دابليو"}','slug' => '{"en":"bmw","ar":"بي-ام-دابليو"}','status' => '0','created_at' => '2022-04-16 13:26:57','updated_at' => '2022-04-16 13:26:57'),
            array('id' => '12','name' => '{"en":"KIA","ar":"كيا"}','slug' => '{"en":"kia","ar":"كيا"}','status' => '1','created_at' => '2022-04-16 13:27:24','updated_at' => '2022-04-16 13:27:24'),
            array('id' => '13','name' => '{"en":"HONDA","ar":"هوندا"}','slug' => '{"en":"honda","ar":"هوندا"}','status' => '0','created_at' => '2022-04-16 13:27:44','updated_at' => '2022-04-16 13:27:44'),
            array('id' => '14','name' => '{"en":"FORD","ar":"فورد"}','slug' => '{"en":"ford","ar":"فورد"}','status' => '0','created_at' => '2022-04-16 13:28:05','updated_at' => '2022-04-16 13:28:05'),
            array('id' => '15','name' => '{"en":"MERCEDES","ar":"مرسيدي"}','slug' => '{"en":"mercedes","ar":"مرسيدي"}','status' => '0','created_at' => '2022-04-16 13:28:35','updated_at' => '2022-04-16 13:28:35')
          );
        Brand::insert($brands);
    }
}

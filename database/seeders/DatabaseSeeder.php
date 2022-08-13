<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\ModelsSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

    $this->call([
        BrandSeeder::class,
        ModelsSeeder::class,
        MediaSeeder::class,
        CitySeeder::class,
        RegionSeeder::class,
    ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\HomepageInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomepageInformation::create([
           'image_name' => 'test.jpg',
        ]);
    }
}

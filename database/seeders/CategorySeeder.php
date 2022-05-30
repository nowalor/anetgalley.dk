<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('id', 1)->first();

        !$category && Category::insert([
            [
                'name' => 'original',
            ],
            [
                'name' => 'replica',
            ],
        ]);
    }
}

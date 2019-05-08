<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Men',
            'image' => 'categories.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Women',
            'image' => 'categories.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Kids',
            'image' => 'categories.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Sports',
            'image' => 'categories.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Digital',
            'image' => 'categories.jpg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Furniture',
            'image' => 'categories.jpg'
        ]);
    }
}

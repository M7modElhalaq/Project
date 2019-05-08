<?php

use Illuminate\Database\Seeder;

class SubCatagoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // MEN

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Casual'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Sports'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Formal'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Standard'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'T-Shirts'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Shirts'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Jeans'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'Trousers'
        ]);


        // WOMEN

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Kurta & Kurti'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Trousers'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Casual'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Sports'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Sarees'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'Shoes'
        ]);

        // KIDS

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Casual'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Sports'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Sleep Wear'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Sandals'
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'Loafers'
        ]);

    }
}

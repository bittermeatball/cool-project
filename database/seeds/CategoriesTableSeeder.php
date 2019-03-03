<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'category_name' => 'Uncategorized',
            'slug' => 'uncategorized',
            'status' => 'active',
            'parent_id' => 0,
            'keywords' => 'uncategorized',
            'description' => 'uncategorized',
        ]);

        $faker = Faker\Factory::create();

        factory(App\Models\Category::class,10)->create();
    }
}

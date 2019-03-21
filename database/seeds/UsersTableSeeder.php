<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Cool Administrator',
            'email' => 'test@gmail.com',
            'password' => bcrypt('1234567890'),
            'role' => 'administrator',
            'status' => 'active',
        ]);

        $faker = Faker\Factory::create();

        factory(App\Models\User::class,20)->create();
    }
}

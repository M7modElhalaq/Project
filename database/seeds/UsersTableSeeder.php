<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Mhmod El-halaq',
            'email' => 'mhmodelhalaq@gmail.com',
            'role_id' => 1,
            'gender' => 'Male',
            'password' => Hash::make('123456789'),
        ]);
    }
}

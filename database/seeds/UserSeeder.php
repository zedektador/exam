<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            "email" => "admin@exam.ph",
            "password" => 'password',
            "name" => "Administrator",
            "group_id" => 1
        ]);
    }
}

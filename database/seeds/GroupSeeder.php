<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Group::create([
            "name" => "Administrator",
            "description" => "Administrator",
            "module_ids" => "[1,2]"
        ]);
    }
}

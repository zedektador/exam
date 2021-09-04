<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Module::create([
            "code" => "user-management",
            "name" => "User Management",
            "description" => "User Management",
        ]);

        \App\Models\Module::create([
            "code" => "group-management",
            "name" => "Group Management",
            "description" => "Group Management",
        ]);

        \App\Models\Module::create([
            "code" => "module-management",
            "name" => "Module Management",
            "description" => "Module Management"
        ]);
    }
}

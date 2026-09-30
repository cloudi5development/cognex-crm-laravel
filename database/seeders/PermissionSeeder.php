<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [

            ['name' => 'Read', 'page' => 'user'],
            ['name' => 'Create', 'page' => 'user'],
            ['name' => 'Edit', 'page' => 'user'],
            ['name' => 'Delete', 'page' => 'user'],
            
            ['name' => 'Read', 'page' => 'permission'],
            ['name' => 'Edit', 'page' => 'permission'],

            ['name' => 'Read', 'page' => 'setting'],
            ['name' => 'Edit', 'page' => 'general_setting'],
            ['name' => 'Edit', 'page' => 'email_setting'],
           
        ];

        foreach ($permission as $permissions) {
            Permission::firstOrCreate($permissions);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data  = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '9876543210',
            'password' => bcrypt('12345678'),
            'status' => 1
        ];
        $checkExist = User::where('email', $data['email'])->where('mobile', $data['mobile'])->exists();
        if (!$checkExist) {
            User::create($data);
        }
    }
}

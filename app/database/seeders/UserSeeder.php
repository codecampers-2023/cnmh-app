<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = \Carbon\Carbon::now();

        $user = User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password'=>'admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);

    }
}

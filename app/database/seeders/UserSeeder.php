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
                'name' => 'Khawla souan',
                'email' => 'khawla@gmail.com',
                'password'=>'123456',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);

    }
}

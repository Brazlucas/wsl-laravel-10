<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lucas admin',
            'email' => 'lukkascomics@gmail.com',
            'password' => Hash::make('97322607l'),
            'is_admin' => true,
        ]);

        // User::create([
        //     'name' => 'Lucas regular',
        //     'email' => 'lukkascomics@gmail.com',
        //     'password' => Hash::make('97322607l'),
        //     'is_admin' => false,
        // ]);
    }
}

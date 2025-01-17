<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'elno@elno.elno'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('elnoelno'),
            ]
        );
    }
}

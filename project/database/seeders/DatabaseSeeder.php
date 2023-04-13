<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        /**
         * Try Sample Login User
         * email: coty10@student.laverdad.edu.ph
         * password: Lvcc#1232
         */

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Announcement::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'caption' => 'hello hanni',
            
        ]);
    }
}

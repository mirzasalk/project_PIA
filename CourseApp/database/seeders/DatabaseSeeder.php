<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $user = User::factory()->create([
            'name' => 'mirza salkovic',
            'email'=>'salkovic.mirza@gmail.com',
        ]);

        Course::factory(5)->create([
            'user_id'=> $user->id
        ]);

    }
}

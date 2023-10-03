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
            'role'=>'Admin',
            'password'=>'123456'
        ]);
        $user = User::factory()->create([
            'name' => 'Amel Tutic',
            'email'=>'amel@gmail.com',
            'role'=>'Predavac',
            'password'=>'123456'
        ]);
        $user = User::factory()->create([
            'name' => 'Edin Salkovic',
            'email'=>'edin@gmail.com',
            'role'=>'Korisnik',
            'password'=>'123456'
        ]);

        Course::factory(5)->create([
            'user_id'=> $user->id
        ]);

    }
}

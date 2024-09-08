<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Complaints;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(UsersSeeder::class);
        $this->call(ComplaintsSeeder::class);
        // $this->call(RolesSeeder::class);
    }
}

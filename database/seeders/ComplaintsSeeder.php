<?php

namespace Database\Seeders;

use App\Models\Complaints;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintsSeeder extends Seeder
{
    use RefreshDatabase;
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Complaints::factory(100)->create();
    }
}

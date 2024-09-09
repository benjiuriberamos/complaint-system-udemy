<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    use RefreshDatabase;
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Roles::ROL_TYPES as $value) {
            Roles::create([
                'type_user' => $value
            ]);
        }
    }
}

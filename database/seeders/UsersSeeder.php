<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    use RefreshDatabase;
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'role_id' => 1,
            'name' => 'Admin admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'image_perfil' => 'foto.jpg',
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Benji Uribe Ramos',
            'email' => 'benjiuriberamos@gmail.com',
            'password' => Hash::make('98738534'),
            'image_perfil' => 'foto.jpg',
        ]);
    }
}

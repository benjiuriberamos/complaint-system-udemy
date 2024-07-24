<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'role_id' => 1,
            'name' => 'Benji Uribe Ramos',
            'email' => 'benjiuriberamos@gmail.com',
            'password' => Hash::make('98738534'),
            'image_perfil' => 'foto.jpg',
        ]);
    }
}

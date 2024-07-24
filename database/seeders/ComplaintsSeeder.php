<?php

namespace Database\Seeders;

use App\Models\Complaints;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Complaints::create([
            'owner_name' => 'Nicolas Garcia Uribe',
            'email' => 'nicolasgarcia@gmail.com',
            'context' => 'este es mi primer reclamo',
            'status' => 'Pendiente',
            'priority' => 'Alta',
            'category' => 'Servicios',
            'id_user' => 1,
        ]);

        Complaints::create([
            'owner_name' => 'María Garcia Uribe',
            'email' => 'maria@gmail.com',
            'context' => 'este es mi primer reclamo',
            'status' => 'Pendiente',
            'priority' => 'Alta',
            'category' => 'Limpieza',
            'id_user' => 2,
        ]);

        Complaints::create([
            'owner_name' => 'Laura Garcia Uribe',
            'email' => 'laura@gmail.com',
            'context' => 'este es mi primer reclamo',
            'status' => 'Pendiente',
            'priority' => 'Alta',
            'category' => 'Otra',
            'id_user' => 3,
        ]);

        Complaints::create([
            'owner_name' => 'Beatriz Garcia Uribe',
            'email' => 'beatriz@gmail.com',
            'context' => 'este es mi primer reclamo',
            'status' => 'Pendiente',
            'priority' => 'Alta',
            'category' => 'Otra',
            'id_user' => 4,
        ]);
    }
}

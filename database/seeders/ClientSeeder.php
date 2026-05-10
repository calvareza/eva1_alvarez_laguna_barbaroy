<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Inyección de datos de prueba (Seed).
     * 
     * Este proceso es vital para que el entorno de desarrollo no esté vacío. 
     * Creamos perfiles realistas que nos permitan testear búsquedas, 
     * validaciones de RUT y flujos de usuario sin tener que crearlos a mano.
     */
    public function run(): void
    {
        Client::create([
            'first_name' => 'Neervison',
            'last_name' => 'Laguna',
            'email' => 'n.laguna@ejemplo.com',
            'phone_number' => '+56912345678',
            'date_of_birth' => '1992-04-10'
        ]);

        Client::create([
            'first_name' => 'Agustina',
            'last_name' => 'Barbaroy',
            'email' => 'agustina.barbaroy@ejemplo.com',
            'phone_number' => '+56987654321',
            'date_of_birth' => '1995-08-20'
        ]);

        Client::create([
            'first_name' => 'Carlos',
            'last_name' => 'Alvarez',
            'email' => 'c.alvarez@ejemplo.com',
            'phone_number' => '+56955554444',
            'date_of_birth' => '1990-01-15'
        ]);
    }
}
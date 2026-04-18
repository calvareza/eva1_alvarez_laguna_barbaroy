<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client; // Importación esencial para evitar el error "Class not found"

class ClientSeeder extends Seeder
{
    /**
     * Justificación Técnica: Se implementa este Seeder para automatizar el llenado 
     * de la tabla de clientes en el entorno de desarrollo. Esto asegura la 
     * consistencia de los datos para pruebas de API y verifica la comunicación 
     * exitosa entre el contenedor PHP y el motor MySQL.
     */
    public function run(): void
    {
        // Registro de prueba 1
        Client::create([
            'first_name' => 'Neervison',
            'last_name' => 'Laguna',
            'email' => 'n.laguna@ejemplo.com',
            'phone_number' => '+56912345678',
            'date_of_birth' => '1992-04-10'
        ]);

        // Registro de prueba 2
        Client::create([
            'first_name' => 'Agustina',
            'last_name' => 'Barbaroy',
            'email' => 'agustina.barbaroy@ejemplo.com',
            'phone_number' => '+56987654321',
            'date_of_birth' => '1995-08-20'
        ]);

        // Registro de prueba 3 (Opcional, para mayor volumen de datos)
        Client::create([
            'first_name' => 'Carlos',
            'last_name' => 'Alvarez',
            'email' => 'c.alvarez@ejemplo.com',
            'phone_number' => '+56955554444',
            'date_of_birth' => '1990-01-15'
        ]);
    }
}
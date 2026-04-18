<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Justificación Técnica: DatabaseSeeder actúa como el punto de entrada principal 
 * para el poblado de la base de datos. Permite organizar y ejecutar de forma 
 * secuencial los diferentes seeders del sistema, garantizando que las tablas 
 * se llenen en el orden correcto para respetar las llaves foráneas y la integridad.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta los seeders de la aplicación.
     * * Justificación: Al registrar aquí el ClientSeeder::class, habilitamos 
     * que el comando 'php artisan db:seed' (o migrate:fresh --seed) 
     * automatice la creación de registros de prueba en un solo paso.
     */
    public function run(): void
    {
        $this->call([
            ClientSeeder::class, // Llamada al seeder de clientes para inyectar datos reales
        ]);
    }
}
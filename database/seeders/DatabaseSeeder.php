<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Orquestador de Poblamiento de Datos.
 * 
 * Esta clase centraliza todos los seeders del sistema. Su importancia radica 
 * en el orden: asegura que los datos se carguen siguiendo las dependencias 
 * de llaves foráneas y la lógica de negocio del core bancario.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Ejecutar la secuencia de carga.
     */
    public function run(): void
    {
        $this->call([
            ClientSeeder::class,
        ]);
    }
}
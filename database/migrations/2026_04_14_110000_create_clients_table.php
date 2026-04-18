<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Análisis de Persistencia: 
 * Se implementa la definición de la tabla 'clients' mediante el constructor de esquemas de Laravel.
 * La elección de tipos de datos específicos (increments, string con longitud definida, date) 
 * responde a la necesidad de optimizar el almacenamiento y garantizar que la base de datos 
 * rechace datos inconsistentes desde el nivel de motor (MySQL).
 */
return new class extends Migration
{
    /**
     * Ejecuta las migraciones para crear la estructura.
     * Justificación: Se utiliza 'client_id' como PK para seguir la convención del modelo.
     * El campo email es único para evitar duplicidad de identidades financieras.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            // Clave Primaria Autoincremental (INT UNSIGNED)
            $table->increments('client_id'); 

            // Datos Personales con límites de caracteres para optimizar índices
            $table->string('first_name', 50); 
            $table->string('last_name', 50); 

            // Identificador único de contacto
            $table->string('email', 100)->unique(); 

            // Campos opcionales para flexibilidad del registro
            $table->string('phone_number', 20)->nullable(); 
            $table->date('date_of_birth')->nullable(); 

            // Auditoría nativa de Laravel (created_at y updated_at)
            $table->timestamps(); 
        });
    }

    /**
     * Revierte la migración eliminando la tabla.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
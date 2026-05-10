<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la creación del esquema de la tabla 'clients'.
     * * Se implementan restricciones de unicidad para garantizar la integridad 
     * de los datos de identidad (RUT) y contacto (Email), fundamentales 
     * para la seguridad del Core Bancario.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            // Identificador interno autoincremental para optimización de índices.
            $table->id(); 
            
            // Contrato de Datos Financieros:
            // El RUT actúa como identificador único legal del cliente.
            $table->string('rut')->unique(); 
            
            // Segmentación de nombres para permitir búsquedas y reportes precisos.
            $table->string('first_name');
            $table->string('last_name');
            
            // Correo electrónico único para comunicaciones oficiales y seguridad.
            $table->string('email')->unique();
            
            // Campo de contacto telefónico obligatorio según protocolo de registro.
            $table->string('phone'); 
            
            // Registro automático de fecha de creación y actualización (Auditoría).
            $table->timestamps(); 
        });
    }

    /**
     * Revierte la operación eliminando la tabla de la base de datos.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/**
 * Contrato de Servicios API - Versión 1.0
 * * Se implementa un esquema de versionamiento para garantizar la compatibilidad
 * ascendente y la escalabilidad del ecosistema bancario.
 */
Route::prefix('v1')->group(function () {
    
    /**
     * Gestión de Nómina de Clientes
     * Acceso: Público/Privado (según middleware)
     */

    // Recupera el listado consolidado de clientes registrados.
    Route::get('/clientes', [ClientController::class, 'index']);
    
    // Procesa el registro formal de un nuevo cliente en la institución.
    Route::post('/clientes', [ClientController::class, 'store']);
    
    // Consulta detallada de un cliente específico mediante identificador.
    // Gestiona internamente excepciones de inexistencia (404).
    Route::get('/clientes/{id}', [ClientController::class, 'show']);
});
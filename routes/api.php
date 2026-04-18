<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ClientController;

/**
 * Justificación Técnica: Se utiliza el archivo api.php para definir los endpoints 
 * de la Fintech, asegurando que las respuestas sigan el estándar JSON y 
 * utilicen el prefijo /api/ para una separación clara de responsabilidades.
 */
Route::get('/health', [HealthController::class, 'check']);

// Rutas para el CRUD de Clientes
Route::apiResource('clients', ClientController::class);
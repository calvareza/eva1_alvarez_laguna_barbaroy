<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * Clase HealthController
 * 
 * Actúa como el "latido de corazón" de nuestro microservicio. Permite que 
 * orquestadores como Docker o Kubernetes sepan si la aplicación está 
 * lista para recibir tráfico.
 */
class HealthController extends Controller
{
    /**
     * Verificar la disponibilidad operativa.
     * 
     * Si este método responde, confirmamos que el servidor web y PHP-FPM 
     * están trabajando en armonía. Es una respuesta ligera y rápida.
     */
    public function check(): JsonResponse
    {
        return response()->json([
            "status"      => "online",
            "version"     => "1.0.0",
            "environment" => "docker"
        ], 200);
    }
}
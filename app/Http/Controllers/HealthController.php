<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * Clase HealthController
 * * Este controlador se encarga de gestionar las peticiones relacionadas con el 
 * estado de salud y disponibilidad de la aplicación. Es una pieza fundamental 
 * para el monitoreo de la infraestructura en entornos dockerizados.
 */
class HealthController extends Controller
{
    /**
     * Verificar estado de salud (Health Check).
     * * Este método retorna el estado operativo de la API. Se utiliza para 
     * validar que el contenedor de la aplicación, el servidor web y el 
     * motor de PHP están funcionando correctamente.
     * * @return JsonResponse Estructura JSON con estado, versión y entorno.
     * @response 200 {
     * "status": "online",
     * "version": "1.0.0",
     * "environment": "docker"
     * }
     */
    public function check(): JsonResponse
    {
        // Retorna una respuesta JSON estrictamente estructurada según los requerimientos del proyecto.
        return response()->json([
            "status"      => "online",  // Indica que el servicio está activo.
            "version"     => "1.0.0",   // Versión actual de la aplicación Fintech.
            "environment" => "docker"   // Define el entorno de ejecución actual.
        ], 200); // El código 200 confirma que la solicitud fue exitosa.
    }
}
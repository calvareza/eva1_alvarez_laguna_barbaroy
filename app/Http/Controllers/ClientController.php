<?php

namespace App\Http\Controllers;

use App\Models\Client; // Importación del modelo para interactuar con la DB
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * Justificación: El ClientController actúa como el mediador en el patrón MVC.
 * Su rol es recibir las peticiones HTTP, coordinar con el Modelo Client 
 * la obtención de datos desde MySQL y retornar una respuesta estandarizada en JSON.
 */
class ClientController extends Controller
{
    /**
     * Obtiene la lista de clientes desde la base de datos.
     * * Justificación: Se utiliza el método estático Client::all() para abstraer 
     * la consulta SQL (SELECT *). Esto garantiza que la API entregue datos 
     * persistentes y reales almacenados en el contenedor de MySQL.
     * * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            // Recuperación de registros mediante Eloquent ORM
            $clients = Client::all();

            return response()->json([
                "status" => "success",
                "message" => "Lista de clientes obtenida desde la base de datos",
                "data" => $clients
            ], 200);

        } catch (\Exception $e) {
            // Manejo de errores en caso de fallo de conexión con el contenedor de BD
            return response()->json([
                "status" => "error",
                "message" => "Error al conectar con la base de datos: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Simula la creación de un cliente para futuras integraciones.
     * * Justificación: Permite validar la capacidad de recepción de datos 
     * (Request) del backend antes de implementar la validación de formularios.
     * * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([
            "status" => "success",
            "message" => "Endpoint de creación preparado para la Fase 2"
        ], 201);
    }
}
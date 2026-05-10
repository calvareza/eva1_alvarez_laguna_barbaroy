<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;

/**
 * Clase ClientController
 * Orquestador de la entidad Clientes. Implementa un Contrato de Datos que abstrae 
 * la base de datos interna de la interfaz pública en español.
 */
class ClientController extends Controller
{
    /**
     * index: Recupera la nómina consolidada.
     * Transforma el modelo interno a un formato estandarizado sin identificadores técnicos.
     */
    public function index(): JsonResponse
    {
        $clients = Client::all()->map(function ($client) {
            return [
                'rut'      => $client->rut,
                'nombre'   => $client->first_name,
                'apellido' => $client->last_name,
                'email'    => $client->email,
                'telefono' => $client->phone,
            ];
        });

        return response()->json([
            "estado"  => "exito",
            "mensaje" => "Consulta de nómina finalizada satisfactoriamente",
            "datos"   => $clients
        ], 200);
    }

    /**
     * store: Formaliza el registro de un nuevo cliente.
     * Valida la integridad de datos y mapea la entrada local al esquema de persistencia.
     */
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'rut'      => 'required|string|max:12|unique:clients,rut',
            'nombre'   => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email'    => 'required|email|unique:clients,email',
            'telefono' => 'required|string|max:20',
        ];

        $messages = [
            'required' => 'El campo :attribute es mandatorio para el registro.',
            'unique'   => 'Este :attribute ya se encuentra registrado en el sistema.',
            'email'    => 'El formato del correo electrónico es inválido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                "estado"  => "error",
                "mensaje" => "La solicitud no cumple con los protocolos de validación",
                "errores" => $validator->errors()
            ], 422);
        }

        $client = Client::create([
            'rut'        => $request->rut,
            'first_name' => $request->nombre,
            'last_name'  => $request->apellido,
            'email'      => $request->email,
            'phone'      => $request->telefono,
        ]);

        return response()->json([
            "estado"  => "exito",
            "mensaje" => "Registro de cliente formalizado correctamente",
            "datos"   => [
                'rut'      => $client->rut,
                'nombre'   => $client->first_name,
                'apellido' => $client->last_name,
                'email'    => $client->email,
                'telefono' => $client->phone,
            ]
        ], 201);
    }

    /**
     * show: Consulta individual por identificador técnico.
     * Garantiza respuestas rápidas y manejo de excepciones para evitar Gateway Time-outs.
     */
    public function show($id): JsonResponse
    {
        try {
            $client = Client::find($id);

            if (!$client) {
                return response()->json([
                    "estado"  => "error",
                    "mensaje" => "El recurso solicitado no existe en los registros corporativos."
                ], 404);
            }

            return response()->json([
                "estado" => "exito",
                "datos"  => [
                    'rut'      => $client->rut,
                    'nombre'   => $client->first_name,
                    'apellido' => $client->last_name,
                    'email'    => $client->email,
                    'telefono' => $client->phone,
                ]
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                "estado"  => "error",
                "mensaje" => "Error interno al procesar la consulta."
            ], 500);
        }
    }
}
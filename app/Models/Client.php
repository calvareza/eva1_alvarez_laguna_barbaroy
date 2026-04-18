<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Justificación: El modelo Client permite interactuar con la tabla 'clients' 
 * mediante el ORM Eloquent, abstrayendo la lógica SQL y facilitando el CRUD.
 */
class Client extends Model {
    protected $primaryKey = 'client_id';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'date_of_birth'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    // Aquí definimos qué datos permitimos que se guarden masivamente.
    // Es nuestra primera capa de seguridad.
    protected $fillable = [
        'rut',
        'first_name',
        'last_name',
        'email',
        'phone'
    ];
}
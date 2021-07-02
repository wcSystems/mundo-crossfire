<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_No_Registrado extends Model
{
    use HasFactory;

    public $table = 'clientes_no_registrados';

    protected $fillable = [
        'names',
        'email',
        'phone',
        'region',
        'comuna',
        'calle',
        'nrocalle',
        'nrocasa',
        'referencia'
    ];

}

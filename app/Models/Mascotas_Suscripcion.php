<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas_Suscripcion extends Model
{
    use HasFactory;

    public $table = 'mascotas_suscripciones';


    protected $fillable = [
        'titulo',
        'cantidad',
        'tipo',
        'suscripcion_id'
    ];
}

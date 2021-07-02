<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio_Despacho extends Model
{
    use HasFactory;

    public $table = 'precio_despacho';

    protected $fillable = [
        'precio_despacho',
        'monto'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;


    public $table = 'paquetes';

    protected $fillable = [
        'nombre_paquete',
        'descripcion_paquete',
        'precio_3',
        'precio_6',
        'precio_12',
        'img_paquete'
    ];

    public function kit(){
        return $this->hasMany('App\Models\Kit','paquete_id');
    }

}

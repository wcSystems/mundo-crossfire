<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    use HasFactory;

    public $table = 'kits';

    protected $fillable = [
        'nombre_kit',
        'descripcion_kit',
        'precio',
        'precio_suscripcion',
        'img_kit',
        'paquete_id'
    ];


    public function paquete(){
        return $this->belongsTo('App\Models\Paquete','paquete_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'productos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'cantidad',
        'precio_no_afiliados',
        'precio_afiliados',
        'precio_promocion',
        'indicador_promocion',
        'categoria_id',
        'destacado',
        'visible',
        'precio_envio',
        'slug',
        'ordenados'
        //'precio_despacho'
    ];

    public function SubCategoriaRelationship() {
        return $this->hasMany('App\Models\Subcategorias_Producto','producto_id','id');
    }

    public function productos_foto()
    {
        return $this->hasMany('App\Models\Productos_Foto', 'producto_id', 'id');
    }

}

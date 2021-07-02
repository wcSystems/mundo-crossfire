<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $table = 'categorias';

    protected $fillable = [
        'nombre_categoria'
    ];

    /* public function producto()
    {
        return $this->hasMany('App\Models\Producto','categoria_id');
    } */

    public function subcategoria(){
        return $this->hasMany('App\Models\Subcategoria','categoria_id');
    }
    
}

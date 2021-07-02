<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Producto extends Model
{
    use HasFactory;

    public $table = 'categorias_productos';

    protected $fillable = [
        'categoria_id',
        'producto_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias_Producto extends Model
{
    use HasFactory;

    public $table = 'subcategorias__productos';

    protected $fillable = [
        'subcategoria_id',
        'producto_id'
    ];
    public function SubCategoria() {
        return $this->belongsTo('App\Models\Subcategoria','id','subcategoria_id');
    }
}

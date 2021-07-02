<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    public $table = 'subcategorias';

    protected $fillable = [
        'nombre_subcategoria',
        'categoria_id'
    ];

    

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }   

}

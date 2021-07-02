<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_Foto extends Model
{
    use HasFactory;

    public $table = 'productos_img';

    protected $fillable = [
        'producto_id',
        'img'
    ];

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public $table = 'ventas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];//

    protected $fillable = [
        'tikcet',
        'name',
        'cantidad',
        'sub_total',
        'total',
        'producto_id',
        'categoria_id',
        'estado',
        'user_id',
        'user_not_register_id'
    ];//

    public function productos()
    {
        return $this->hasOne('App\Models\Producto', 'id' , 'producto_id');
    }
}

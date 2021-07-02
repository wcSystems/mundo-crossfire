<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Informacion_Cliente extends Model
{
    use HasFactory;

    public $table = 'informacion_clientes';

    protected $fillable = [
        'fecha_nacimiento',
        'region',
        'comuna',
        'calle_avenida',
        'numero',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


}

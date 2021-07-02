<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kits_Suscripcion extends Model
{
    use HasFactory;

    public $table = 'kits_suscripciones';

    protected $fillable = [
       'kit_id',
       'suscripcion_id'
    ];
}

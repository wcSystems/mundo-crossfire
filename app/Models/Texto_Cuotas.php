<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto_Cuotas extends Model
{
    use HasFactory;
    public $table = 'texto_cuotas';

    protected $fillable = [
        'cuotas'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto_Comuna extends Model
{
    use HasFactory;
    public $table = 'texto_comunas';

    protected $fillable = [
        'comunas'
    ];
}

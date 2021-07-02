<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;

    public $table = 'marcas';

    protected $fillable = [
        'img_marcas'
    ];
}

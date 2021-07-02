<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];//

    protected $fillable = [
        'name',
    ];//
}

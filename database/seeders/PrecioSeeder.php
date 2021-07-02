<?php

namespace Database\Seeders;

use App\Models\Precio_Despacho;
use Illuminate\Database\Seeder;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $precio = new Precio_Despacho();
        $precio->precio_despacho =0;
        $precio->save();
    }
}

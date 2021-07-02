<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria_Producto;


class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos=Producto::select('id','categoria_id')->get();

        foreach ($productos as $producto) {
            $categoria = new Categoria_Producto();
            $categoria->categoria_id =$producto->categoria_id;
            $categoria->producto_id = $producto->id;
            $categoria->save();
        }

    }
}

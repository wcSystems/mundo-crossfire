<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategoria;
use App\Models\Categoria;


class SubcategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->has('valor_subca')) {
            $id=$request->valor_subca;
            $subcategoria=Subcategoria::find($id);
            $subcategoria->nombre_subcategoria=$request->nombre_subcategoria;
            $subcategoria->save();
    
            return response()->json(['success'=>'Guardado']);
        }


        Subcategoria::updateOrCreate(['id' => $request->subcategoria_id],
        ['nombre_subcategoria' => $request->nombre_subcategoria,
        'categoria_id' => $request->categoria_id]);        

        return response()->json(['success'=>'Sub-Categoria Guardada.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subca=Subcategoria::where('categoria_id',$id)->get();
        return response()->json($subca, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategoria::find($id)->delete();
        return response()->json(['success'=>'Sub-Categoria Borrada Exitosamente!']);
    }

    public function enviarSubcategory($id){
        $subcat=\DB::table('subcategorias__productos')->where('producto_id',$id)->get();
        $cate=\DB::table('categorias_productos')->where('producto_id',$id)->get();

        return response()->json(['subcat'=>$subcat, 'cate' => $cate]);
    }

    public function enviarSubcategoryPorCategoria(Request $request){
        $subcat=\DB::table('subcategorias')->whereIn('categoria_id',$request->category)->get();
        return response()->json([$subcat]);
    }
}

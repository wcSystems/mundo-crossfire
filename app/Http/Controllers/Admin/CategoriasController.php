<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use DataTables;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Categoria::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nombre_categoria', function ($data) { 
                        return  $data->nombre_categoria;
                     })
                    ->addColumn('nombre_subcategoria', function ($data) { 
                        $subcategorias= Subcategoria::where('categoria_id',$data->id)->get();

                        $subca=array();

                        foreach($subcategorias as $fila) {
                            array_push($subca, $fila->nombre_subcategoria);
                        }
                
                        $subcategory=implode(", ", $subca);
                        return $subcategory;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Sub-Categorias" class="edit btn btn-info btn-sm subcatex">Sub-Categorias</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('Admin.categorias');
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
         Categoria::updateOrCreate(['id' => $request->categoria_id],
                 ['nombre_categoria' => $request->nombre_categoria]);        
    
         return response()->json(['success'=>'Categoria Guardada.']);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= Categoria::find($id);
        return response()->json($categoria);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
        Categoria::find($id)->delete();
     
        return response()->json(['success'=>'Categoria Borrada Exitosamente!']);
     }
    
     public function list_categorias(){
        $categoria=Categoria::select('id','nombre_categoria')->get();
        return response()->json(['categoria'=>$categoria]);
     }
}

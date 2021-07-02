<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Texto_Cuotas;
use DataTables;

class TextoCuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Texto_Cuotas::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('updated_at', function ($request) {
                        return $request->updated_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="ver btn btn-primary btn-sm">Ver</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $count=Texto_Cuotas::count();
        return view('Admin.cuotas')->with('count',$count);
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
        Texto_Cuotas::updateOrCreate(['id' => $request->cuotas_id],
                 ['cuotas' => $request->descripcion_cuotas]);        
    
         return response()->json(['success'=>'Informacion Guardada.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuotas= Texto_Cuotas::find($id);
        return response()->json($cuotas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuotas= Texto_Cuotas::find($id);
        return response()->json($cuotas);
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
        Texto_Cuotas::find($id)->delete();
        return response()->json(['success'=>'Informacion Borrada Exitosamente!']);
    }
}

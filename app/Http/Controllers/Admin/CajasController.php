<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cajas;

class CajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajas1=Cajas::where('numero',1)->first();
        $cajas2=Cajas::where('numero',2)->first();
        $cajas3=Cajas::where('numero',3)->first();
        return view('Admin.cajas')->with('cajas1',$cajas1)->with('cajas2',$cajas2)->with('cajas3',$cajas3);
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
        Cajas::updateOrCreate(['numero' => $request->cajas_id],
                 ['contenido' => $request->descripcion_cajas]);        
    
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
        $cajas= Cajas::find($id);
        return response()->json($cajas);
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
        Cajas::whereNumero($id)->delete();
        return response()->json(['success'=>'Informacion Eliminada Exitosamente!']);
    }

    public function enviarInfoCajas($id){

        $contenido=Cajas::select('contenido')->wherenumero($id)->get();
        return response()->json(['contenido'=> $contenido]);
    }
}

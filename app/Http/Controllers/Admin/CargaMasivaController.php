<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class CargaMasivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role_id',3)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('azul', function($row){
                        $btn = '<input type="number" data-id="'.$row->id.'" id="azul'.$row->id.'" class="azul form-control" value="'.$row->azul.'">';
                        return $btn;
                    })
                    ->addColumn('verde', function($row){
                        $btn = '<input type="number" data-id="'.$row->id.'" id="verde'.$row->id.'" class="verde form-control" value="'.$row->verde.'">';
                        return $btn;
                    })
                    ->addColumn('amarillo', function($row){
                        $btn = '<input type="number" data-id="'.$row->id.'" id="amarillo'.$row->id.'" class="amarillo form-control" value="'.$row->amarillo.'">';
                        return $btn;
                    })
                    ->addColumn('rojo', function($row){
                        $btn = '<input type="number" data-id="'.$row->id.'" id="rojo'.$row->id.'" class="rojo form-control" value="'.$row->rojo.'">';
                        return $btn;
                    })
                    ->rawColumns(['azul','verde','amarillo','rojo'])
                    ->make(true);
        }


        return view('Admin.clientes.carga-masiva');
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
        if($request->has('azul_id')){
            $user=User::find($request->azul_id);
            $user->azul=$request->valor;
            $user->save();
        }

        if($request->has('verde_id')){
            $user=User::find($request->verde_id);
            $user->verde=$request->valor;
            $user->save();
        }

        if($request->has('amarillo_id')){
            $user=User::find($request->amarillo_id);
            $user->amarillo=$request->valor;
            $user->save();
        }

        if($request->has('rojo_id')){
            $user=User::find($request->rojo_id);
            $user->rojo=$request->valor;
            $user->save();
        }
        return response()->json(['success'=>'Actualizado.']);
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
        //
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
        //
    }
}

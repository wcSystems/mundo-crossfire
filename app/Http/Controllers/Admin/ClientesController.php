<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Informacion_Cliente;
use DataTables;

class ClientesController extends Controller
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
                    ->editColumn('created_at', function ($request) {
                        return $request->created_at->format('Y-m-d'); 
                      })
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Reciclar" class="reciclaje btn btn-info btn-sm"><i class="fa fa-recycle" aria-hidden="true"></i></a>';
                        //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Direccion" class="direccion btn btn-success btn-sm">Direccion</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('Admin.clientes.clientes-registrados');
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

        if($request->create_edit==0){
            //EDICION
            User::updateOrCreate(['id' => $request->cliente_id],
                 ['name' => $request->name,
                 'email'=>$request->email]);

        }else{

            User::updateOrCreate(['id' => $request->cliente_id],
                 ['name' => $request->name,
                 'password' => Hash::make($request->password),
                 'email'=>$request->email]);  
        }     
    
         return response()->json(['success'=>'Cliente Guardado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=Informacion_Cliente::where('user_id',$id)->get();
        return response()->json($cliente);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente= User::find($id);
        return response()->json($cliente);
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
        User::find($id)->delete();
     
        return response()->json(['success'=>'Cliente Eliminado Exitosamente!']);
    }

    public function reciclaje(Request $request){

        User::updateOrCreate(['id' => $request->user_id],
            ['azul' => $request->azul,
            'verde' => $request->verde,
            'amarillo' => $request->amarillo,
            'rojo' => $request->rojo]);      

        return response()->json(['success'=>'Reciclaje Guardado.']);
    }
}

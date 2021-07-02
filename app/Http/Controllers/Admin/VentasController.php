<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;
use DataTables;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Venta::select(\DB::raw('IF(estado=1,"Ejecutado","Pendiente") as name_estado, estado'),'name','ticket')
                    ->groupBy('ticket','estado','name')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('check', function ($data) { 
                        if($data->estado==0){
                            return '<i class="fa fa-clock-o fa-2x" aria-hidden="true"></i>';
                        }else{
                            return '<i class="fa fa-check fa-2x" aria-hidden="true"></i>';
                        }
                     })
                    ->addColumn('estado', function ($data) { 
                        if($data->estado==0){
                            return '<span class="badge badge badge-danger badge-pill">Pendiente</span>';
                        }else{
                            return '<span class="badge badge badge-success badge-pill">Ejecutado</span>';
                        }
                    })
                    ->addColumn('action', function($row){
                        /*$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';*/
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->ticket.'" class="ver btn btn-primary btn-sm">Ver Pedido</a>';
                        return $btn;
                    })
                    ->rawColumns(['action','check','estado'])
                    ->make(true);
        }
        return view('Admin.ventas.ejecutadas');
    }

    /*public function indexPendiente(Request $request)
    {

        if ($request->ajax()) {
        
            $data = Venta::whereEstado(0)->select(\DB::raw('IF(estado=0,"Pendiente","Ejecutado") as name_estado, estado'),'name','ticket')
                    ->groupBy('ticket','estado','name')->get();
            
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        /*$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Borrar</a>';*/
                    /*    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->ticket.'" class="ver btn btn-primary btn-sm">Ver Pedido</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.ventas.pendientes');
    }*/

    public function sendInfoVentas(Request $request, $ticket){

        $venta= Venta::join('productos','ventas.producto_id', '=', 'productos.id')->whereticket($ticket)
                ->select('ventas.created_at','titulo','sub_total','total','ticket','ventas.cantidad')->get();
        return response()->json($venta);

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
        //
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

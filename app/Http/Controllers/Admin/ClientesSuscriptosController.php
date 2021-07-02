<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suscripcion;
use App\Models\Kits_Suscripcion;
use App\Models\Fecha_Suscripcion;
use App\Models\Mascotas_Suscripcion;
use DataTables;

class ClientesSuscriptosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=Suscripcion::join('paquetes','suscripciones.paquete_id','=','paquetes.id')
                            ->join('users','suscripciones.user_id','=','users.id')
                            ->where('estado',1)
                            ->latest('suscripciones.id')
                            ->select('nro_suscripcion','name','nombre_paquete','dia_visita','semana_visita','suscripciones.id','tiempo','mascotas','estado')
                            ->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            // ->addColumn('estado', function ($data) { 
                            //     if($data->estado==0){
                            //         return '<span class="badge badge badge-danger badge-pill">Pendiente</span>';
                            //     }else{
                            //         return '<span class="badge badge badge-success badge-pill">Ejecutado</span>';
                            //     }
                            // })
                            ->editColumn('tiempo', function ($request) {
                                return $request->tiempo.' Meses'; 
                              })
                            ->addColumn('action', function($row){
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="ver-kits btn btn-info btn-sm" style="padding-left:35px;padding-right:35px">Kits</a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="mascotas btn btn-sm" style="background: #0e749c; color:white">Mascotas</a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->nro_suscripcion.'" class="ver btn btn-primary btn-sm" >Direccion</a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->nro_suscripcion.'" class="fechas btn btn-warning btn-sm"  style="padding-left:27px;padding-right:27px">Fechas</a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->nro_suscripcion.'" data-original-title="Edit"  style="padding-left:30px;padding-right:30px" class="edit btn btn-success btn-sm editProduct">Editar</a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->nro_suscripcion.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct" style="padding-left:28px;padding-right:28px">Borrar</a>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('Admin.clientes.clientes-suscriptos');
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
        Suscripcion::where('id',$request->suscripto_id)
        ->update(['paquete_id' => $request->paquete_id,
                  'dia_visita'=>$request->dia_visita,
                  'semana_visita'=>$request->semana_visita]);
    
        return response()->json(['success'=>'Suscripcion Guardada.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suscripcion= Suscripcion::where('nro_suscripcion',$id)->get();
        return response()->json($suscripcion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suscripcion= Suscripcion::where('nro_suscripcion',$id)->first();
        return response()->json($suscripcion);
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
        Suscripcion::where('nro_suscripcion',$id)->delete();
     
        return response()->json(['success'=>'Suscripcion Borrada Exitosamente!']);
    }


    public function sendKits($id){

        $kits=Kits_Suscripcion::join('kits','kits_suscripciones.kit_id','=','kits.id')
                              ->select('nombre_kit','precio')->where('suscripcion_id',$id)->get();

        return response()->json($kits);

    }

    public function saveFechas(Request $request){

        Fecha_Suscripcion::updateOrCreate(['suscripcion_id' => $request->id_suscripcion],
                          ['fecha_1' => $request->fecha_1,
                           'fecha_2' => $request->fecha_2,
                           'fecha_3' => $request->fecha_3,
                           'fecha_4' => $request->fecha_4,
                           'fecha_5' => $request->fecha_5,
                           'fecha_6' => $request->fecha_6,
                           'fecha_7' => $request->fecha_7,
                           'fecha_8' => $request->fecha_8,
                           'fecha_9' => $request->fecha_9,
                           'fecha_10' => $request->fecha_10,
                           'fecha_11' => $request->fecha_11,
                           'fecha_12' => $request->fecha_12,
                           'fecha_13' => $request->fecha_13,
                           'fecha_14' => $request->fecha_14,
                           'fecha_15' => $request->fecha_15,
                           'fecha_16' => $request->fecha_16,
                           'fecha_17' => $request->fecha_17,
                           'fecha_18' => $request->fecha_18,
                           'fecha_19' => $request->fecha_19,
                           'fecha_20' => $request->fecha_20,
                           'fecha_21' => $request->fecha_21,
                           'fecha_22' => $request->fecha_22,
                           'fecha_23' => $request->fecha_23,
                           'fecha_24' => $request->fecha_24
                          ]);


        return response()->json(['success'=>'Fechas Guardadas']);
    }

    public function fechasSuscripciones($id_sus){

        $fechas=Fecha_Suscripcion::where('suscripcion_id',$id_sus)->select('id','fecha_1','fecha_2','fecha_3','fecha_4'
        ,'fecha_5','fecha_6','fecha_7','fecha_8','fecha_9','fecha_10','fecha_11','fecha_12','fecha_13'
        ,'fecha_14','fecha_15','fecha_16','fecha_17','fecha_18','fecha_19','fecha_20','fecha_21'
        ,'fecha_22','fecha_23','fecha_24')->get();
        return response()->json($fechas);

    }

    public function sendMascotas($suscrip_id){

        $mascota=Mascotas_Suscripcion::where('suscripcion_id',$suscrip_id)->get();
        return response()->json($mascota);

    }

}

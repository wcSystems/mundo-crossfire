<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paquete;
use App\Models\Kit;
use App\Models\Suscripcion;
use App\Models\Kits_Suscripcion;
use App\Models\Mascotas_Suscripcion;
use App\Models\Informacion_Cliente;


use Illuminate\Support\Facades\Hash;




class NewSuscripcionController extends Controller
{
    public function index(){
        return view('Admin.new-suscripcion');
    }


    public function create (){

        $usuarios=User::where('role_id',3)->select('name','id','email')->get();
        $planes=Paquete::select('nombre_paquete','id')->get();
        $extensiones=Kit::select('id','nombre_kit')->get();

        return response()->json(['usuarios' => $usuarios, 
                                 'planes' => $planes,
                                 'extensiones' => $extensiones
                                ]);

    }

    public function store(Request $request){

        $ticket=date("Ymd").rand(5, 100000);

        $semana=$request->semana;
        $semana_v = implode(", ", $semana);


            if($request->email!=''){

                if(User::where('email',$request->email)->exists()){
                    return response()->json([
                        'success' => "Este usuario ya esta registrado!"
                    ], 200);
                   
                }

                $user = new User;
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=Hash::make('suscripcion-cliente');
                $user->role_id=3;
                $user->save();


                $informacion= new Informacion_Cliente;
                $informacion->region='Region Metropolitana';
                $informacion->comuna=$request->comuna;
                $informacion->calle_avenida=$request->calle;
                $informacion->numero=$request->numero;
                $informacion->user_id=$user->id;
                $informacion->save();

            }

            $suscripcion = new Suscripcion;
            $suscripcion->paquete_id=$request->plan;
            $suscripcion->dia_visita=$request->dia_visita;
            $suscripcion->region='Region Metropolitana';
            $suscripcion->comuna=$request->comuna;
            $suscripcion->calle_avenida=$request->calle;
            $suscripcion->numero=$request->numero;
            $suscripcion->nro_suscripcion=$ticket;

                if($request->email!=''){
                    $suscripcion->user_id=$user->id;
                }else{
                    $suscripcion->user_id=$request->user;
                }

            $suscripcion->nrocasa=$request->nrocasa;
            $suscripcion->referencia=$request->referencia;

            $suscripcion->estado=1;
            $suscripcion->semana_visita=$semana_v;
            $suscripcion->tiempo=$request->tiempo;
            $suscripcion->mascotas=$request->vueradio;
            $suscripcion->telefono=$request->telefono;
            $suscripcion->save();


            if(isset($request->extensiones)){
                for($j=0; $j < (count($request->input('extensiones'))) ;$j++){
                    $kit_suscripcion = new Kits_Suscripcion();
                    $kit_suscripcion->suscripcion_id=$suscripcion->id;
                    $kit_suscripcion->kit_id=$request->input('extensiones.'.$j);
                    $kit_suscripcion->save(); 
                }
            }

           
            if(($request->vueradio)=='Si'){

                if ($request->has('tipodemascotas')) {

                    $tipo = $request->tipodemascotas;
                
                    if (in_array("Perro", $request->tmascotas)) {
                        array_unshift($tipo,null);
                    }

                    if (in_array("Gato", $request->tmascotas)) {
                        array_unshift($tipo,null);
                    }

                }   
                

                for($i=0; $i < (count($request->input('tmascotas'))) ;$i++){
                
                    $mascota = new Mascotas_Suscripcion();
                    $mascota->titulo=$request->input('tmascotas.'.$i);
                    $mascota->cantidad=$request->input('nmascotas.'.$i);
                        if ($request->has('tipodemascotas')) {
                            $mascota->tipo=$tipo[$i];
                        }
                    
                    $mascota->suscripcion_id=$suscripcion->id;
                    $mascota->save();

                }
            }
    
        return response()->json(['success'=>'Cargado Exitosamente']);
        
    }
}

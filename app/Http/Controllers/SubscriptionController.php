<?php

namespace App\Http\Controllers;

use App\Mail\NotificationPetcicla;
use App\Mail\RegisterUserMail;
use App\Mail\SuscriptionRegisterMail;
use App\Models\Kit;
use App\Models\Paquete;
use App\Models\User;
use App\Models\Informacion_Cliente;
use App\Models\Suscripcion;
use App\Models\Kits_Suscripcion;
use App\Models\Fecha_Suscripcion;
use App\Models\Mascotas_Suscripcion;
use App\Models\Texto_Comuna;
use App\Models\Texto_Cuotas;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages= Paquete::get();
        $kit = Kit::orderBy('created_at','DESC')->get();
        $comuna_t=Texto_Comuna::first();
        $cuotas=Texto_Cuotas::first();
        return view('subscribe')->with('packages',$packages)->with('kits',$kit)->with('comuna_t',$comuna_t)->with('cuotas',$cuotas);
    }

    public function subscribeForm(Request $request)
    {
        
        return view('subscribe-form');
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

    public function cliente_suscripcion(Request $request){

        try {

            if( (($request->payload['paquete_id'])=="2") && (count($request->payload['semana_visita'])==2) ){
                return response()->json(['error' => 'Error! Por Favor Seleccione una Sola Semana'], 400);
            }

            $ticket = date("Ymd").rand(5, 1000);
            if (!(Auth::check())) {

                if(User::where('email',$request->payload['email'])->exists()){
                    return response()->json([
                        'error' => "Este usuario ya esta registrado, por favor inicie sesión en su cuenta con su email y clave"
                    ], 400);
                    // return response()->json(['El Correo ya Existe, Por Favor Ingrese a Login!']);
                }
                
                //CREAR USUARIO
                $user = new User;
                $user->name=$request->payload['name'];
                $user->email=$request->payload['email'];
                $user->password=Hash::make($request->payload['password']);
                // $user->suscribe= true;
                $user->save();
                Mail::to($user->email)->send(new RegisterUserMail($user));
                Mail::to("info@willinthon.tech")->send(new NotificationPetcicla($user,false , 3));

                

                //GUARDAR INFORMACION DEL CLIENTE 
                $informacion= new Informacion_Cliente;
                //$informacion->fecha_nacimiento=$request->payload['fecha_nacimiento'];
                $informacion->region=$request->payload['region'];
                $informacion->comuna=$request->payload['comuna'];
                $informacion->calle_avenida=$request->payload['calle_avenida'];
                $informacion->numero=$request->payload['numero'];
                $informacion->user_id=$user->id;
                $informacion->save();
                
            }

            // if (Auth::check()) {
            //     if(Suscripcion::where('user_id',Auth::id())->where('paquete_id',$request->paquete_id)->where('kit_id',$request->kit_id)->exists()){
            //         return response()->json(['El Cliente ya posee una suscripcion similar!']);
            //     }
            // }

            
            //DESCOMPRIMO EL ARRAY DE SEMANAS A TEXTO
            $semana=$request->payload['semana_visita'];
            $semana_v = implode(", ", $semana);

            //CREAR NUEVA SUSCRIPCION
            $suscripcion=new Suscripcion;
            $suscripcion->paquete_id=$request->payload['paquete_id'];
            $suscripcion->dia_visita=$request->payload['dia_visita'];
            $suscripcion->region=$request->payload['region'];
            $suscripcion->comuna=$request->payload['comuna'];
            $suscripcion->calle_avenida=$request->payload['calle_avenida'];
            $suscripcion->numero=$request->payload['numero'];
            $suscripcion->nro_suscripcion=$ticket;
            $suscripcion->user_id=Auth::check() ? Auth::id() : $user->id;
            $suscripcion->estado=0;
            $suscripcion->semana_visita=$semana_v;
            $suscripcion->tiempo=$request->payload['tiempo'];

            if($request->payload['nrocasa']==""){
                $suscripcion->nrocasa=null;
            }else{
                $suscripcion->nrocasa=$request->payload['nrocasa'];
            }

            if($request->payload['referencia']==""){
                $suscripcion->referencia=null;
            }else{
                $suscripcion->referencia=$request->payload['referencia'];
            }
            
            $suscripcion->mascotas=$request->payload['mascota_si_no'];
            $suscripcion->telefono=$request->payload['phone'];
            $suscripcion->save();



            //PARA LA RELACION DE SUSCRIPCIONES DE FECHAS
            $fecha=new Fecha_Suscripcion;
            $fecha->suscripcion_id=$suscripcion->id;
            $fecha->save();

            //GUARDAR VARIOS KITS RELACIONADOS CON SUSCRIPCION.
            if(isset($request->payload['kits'])){
                $kits=$request->payload['kits'];
                foreach ($kits as $key => $kit){
                    $kit_suscripcion = new Kits_Suscripcion();
                    $kit_suscripcion->suscripcion_id=$suscripcion->id;
                    $kit_suscripcion->kit_id=$kit['id'];
                    $kit_suscripcion->save(); 
                }
            }
            

            //GUARDAR MASCOTAS
            if($request->payload['mascota_si_no']=='Si'){
                $mascotas=$request->payload['mascotas'];
                foreach($mascotas as $llave => $mascota){
                    $mascotas_suscripcion= new Mascotas_Suscripcion;
                    $mascotas_suscripcion->titulo=$mascota['titulo'];
                    $mascotas_suscripcion->cantidad=$mascota['cantidad'];
                    $mascotas_suscripcion->tipo=$mascota['tipo'];
                    $mascotas_suscripcion->suscripcion_id=$suscripcion->id;
                    $mascotas_suscripcion->save();
                }
            }


            
            $returnUrl= url("subscribe-payment-check?ticket={$ticket}");
            $user = Auth::check() ? Auth::id() : $user->id;
            $total = $request->payload['total'];

            Suscripcion::payment();
            $response = Transaction::create($ticket, $user, $total, $returnUrl);
            return response()->json(['status' => 'success','response' => $response]);
            
        } catch (Exception $ex) {
            if (!(Auth::check())) {
                $delete = User::find($user->id)->exists() ? User::find($user->id)->delete() : null;
            }
            return response()->json([
                'exception' => $ex,
                'error' => $ex->getMessage()
            ], 500);
        }
    }

    public function susbcriptionPaymentCheck(Request $request){

        Suscripcion::payment();
        $response = Transaction::commit($request->token_ws);
        if($request->token_ws){

            if ($response->getResponseCode() == 0) {
            $ventas = Suscripcion::
            where('nro_suscripcion',$request->ticket)
            ->update(['estado' => 1]);
                $suscripcion = Suscripcion::where('nro_suscripcion',$request->ticket)->first();
                $user = User::find($suscripcion->user_id);
                $user->suscribe= true;
                $user->save();

                Mail::to($user->email)->send(new SuscriptionRegisterMail($user, $suscripcion));
                Mail::to("info@willinthon.tech")->send(new NotificationPetcicla($user, $suscripcion , 2));
                Auth::login($user, true);
                return redirect('/success/'.$suscripcion->nro_suscripcion.'?suscripcion=1');
            }else{
                $suscripcion = Suscripcion::where('nro_suscripcion',$request->ticket)->first();
                return redirect('/error/'.$suscripcion->nro_suscripcion.'?suscripcion=1');
            }
        }else{
            $suscripcion = Suscripcion::where('nro_suscripcion',$request->ticket)->first();
            return redirect('/');
        }


    }
}

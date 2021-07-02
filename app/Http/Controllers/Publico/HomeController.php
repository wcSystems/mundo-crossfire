<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Productos_Foto;
use App\Models\Suscripcion;
use App\Models\Venta;
use App\Models\Mensaje;
use App\Models\User;
use App\Models\Kit;
use App\Models\Kits_Suscripcion;
use App\Models\Informacion_Cliente;
use App\Models\Fecha_Suscripcion;
use App\Models\Precio_Despacho;
use App\Models\Seccion;
use App\Models\Marcas;
use App\Models\Cajas;
use App\Models\Categoria_Producto;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    public function index(){

        $banners = Banner::get();
        $seccion=Seccion::first();
        $marcas=Marcas::get();
        $caja1=Cajas::wherenumero('1')->first();
        $caja2=Cajas::wherenumero('2')->first();
        $caja3=Cajas::wherenumero('3')->first();




       /*  $productos=Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->select('productos.id','nombre_categoria','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','img_principal','descripcion','slug')->where('productos.destacado',1)
        ->where('visible',1)
        ->where('slug','!=',null)
        ->inRandomOrder()->limit(4)->get(); */

        $productos=Producto:://join('categorias_productos','productos.id','=','categorias_productos.producto_id')
        //->join('categorias','categorias_productos.categoria_id','=','categorias.id')
        select('productos.id','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','img_principal','descripcion','slug')->where('productos.destacado',1)
        ->where('visible',1)
        ->where('slug','!=',null)
        ->inRandomOrder()->limit(4)->get();

        if($productos!="[]"){
            foreach ($productos as $producto){
                $data[] = $producto->id;
            }

            $categorias=Categoria_Producto::join('categorias','categorias_productos.categoria_id','=','categorias.id')
            ->whereIn('categorias_productos.producto_id',$data)->select('nombre_categoria','categorias_productos.producto_id as id')->get();


            return view('home')->with('categorias',$categorias)->with('productos',$productos)->with('banners',$banners)->with('seccion',$seccion)->with('marcas',$marcas)->with('caja1',$caja1)->with('caja2',$caja2)->with('caja3',$caja3);
        }else{
            return view('home')->with('productos',$productos)->with('banners',$banners)->with('seccion',$seccion)->with('marcas',$marcas)->with('caja1',$caja1)->with('caja2',$caja2)->with('caja3',$caja3);
        }
    }

    public function history(){
        $compras = Venta::where('user_id', Auth::id())->distinct('ticket')->select('ticket','total','estado')->orderBy('estado','ASC')->get();
        $suscripciones = Suscripcion::join('fechas_suscripciones','suscripciones.id','=','fechas_suscripciones.suscripcion_id')
                        ->join('paquetes','suscripciones.paquete_id','=','paquetes.id')
                        ->where('user_id', Auth::id())->get();
    //dd($suscripciones);
        return view('history-cart')->with('compras',$compras)->with('suscripciones',$suscripciones);
    }

    public function sendMensaje(Request $request){

        Mensaje::create($request->only('name','email','mensaje'));
        return response()->json(['Mensaje Enviado Correctamente']);
      
    }

    public function sendInfoTicket($ticket){
        $info=Venta::join('productos','ventas.producto_id','=','productos.id')->whereticket($ticket)
        ->select(\DB::raw('DATE(ventas.created_at) AS Fecha'),'ventas.cantidad','titulo','precio_no_afiliados','precio_envio','ventas.created_at','ticket','sub_total','total')->get();   
        $precio_despacho=Precio_Despacho::sum('precio_despacho');   
        return response()->json(['info'=>$info, 'precio_despacho' => $precio_despacho]);
    }

    public function settingsAccount(){

        $reciclaje=User::where('id', Auth::id())->get();
        $informacion=Informacion_Cliente::where('user_id',Auth::id())->get();

        return view('account-setting')->with('reciclaje',$reciclaje)->with('informacion',$informacion);
    }

    public function updateInfoUser(Request $request){


        Informacion_Cliente::updateOrCreate(['user_id' => $request->user_id],
                                    ['fecha_nacimiento'=>$request->fecha_nacimiento,
                                    'region'=>$request->region,
                                    'comuna'=>$request->comuna,
                                    'calle_avenida'=>$request->calle_avenida,
                                    'numero'=>$request->numero]);              

        $user=User::find($request->user_id);
        $user->name = $request->name;       
        $user->save(); 
       
        return response()->json(['Actualizado Correctamente!']);
    }

    public function updatePassword(Request $request){

    
        $user=User::find($request->userid);
        $user->password = Hash::make($request->password);       
        $user->save(); 

        return response()->json(['Actualizado Correctamente!']);
    }


    public function sendInfoSuscripcion($nro_suscripcion){

        $id=Suscripcion::where('nro_suscripcion',$nro_suscripcion)->sum('id');

        if(Kits_Suscripcion::where('suscripcion_id',$id)->exists()){

            $info=Suscripcion::join('paquetes','suscripciones.paquete_id','=','paquetes.id')
                            ->join('kits_suscripciones','suscripciones.id','=','kits_suscripciones.suscripcion_id')
                            ->where('nro_suscripcion',$nro_suscripcion)
                            ->get('kit_id');

            foreach ($info as $key => $value) {
                $kits[]=$value->kit_id;
            }

            $name_kits=Kit::whereIn('id',$kits)->select('nombre_kit','precio')->get();
        }else{
            $name_kits=0;
            
        }

        $info_suscrip=Suscripcion::join('paquetes','suscripciones.paquete_id','=','paquetes.id')
                                 ->where('nro_suscripcion',$nro_suscripcion)
                                 ->get();

        return response()->json(['success', 'info_suscrip' => $info_suscrip, 'name_kits' => $name_kits]);
        
    }

    public function emailCheck(Request $request){

        if(User::where('email',$request->email)->exists()){
            $check=1;
        }else{
            $check=0;
        }
        
        return response()->json($check);

    }
}

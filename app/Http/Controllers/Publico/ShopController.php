<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Mail\NotificationPetcicla;
use App\Mail\ShopBuyMail;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Productos_Foto;
use App\Models\Suscripcion;
use App\Models\User;
use App\Models\Venta;
use App\Models\Cliente_No_Registrado;
use App\Models\Categoria_Producto;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;




class ShopController extends Controller
{
    public function index(){

        $contador=Producto::count();
        $last_name = [3];

        /*$productos=Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->where('slug','!=',null)
        ->select('productos.id','nombre_categoria','categorias.id AS categoria_id','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','precio_envio','img_principal','descripcion','slug')->where('visible',1)
        ->orderBy('titulo','ASC')
        ->get();
        $categorias = Categoria::get();
        return view('shop')->with('contador',$contador)->with('productos',$productos)->with('categorias',$categorias);*/


        /* $productos=Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                    ->where('slug','!=',null)
                    ->select('ordenados','productos.id','nombre_categoria','categorias.id AS categoria_id','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','precio_envio','img_principal','descripcion','slug')->where('visible',1)
                    ->orderByRaw('-ordenados', 'DESC')
                    ->orderBy('precio_no_afiliados','ASC')
                    ->get(); */

        //$productos = $productos->reverse();

        $productos=Producto::where('slug','!=',null)
                    ->select('ordenados','id','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','precio_envio','img_principal','descripcion','slug')->where('visible',1)
                    ->orderByRaw('-ordenados', 'DESC')
                    ->orderBy('precio_no_afiliados','ASC')
                    ->get();

        if($productos=="[]"){
           return redirect('/');
        }

        foreach ($productos as $producto){
                        $data[] = $producto->id;
        }
            
        $categories=Categoria_Producto::join('categorias','categorias_productos.categoria_id','=','categorias.id')
                  ->whereIn('categorias_productos.producto_id',$data)->select('nombre_categoria','categorias_productos.producto_id as id')->get();


        $categorias = Categoria::get();
        return view('shop')->with('contador',$contador)->with('productos',$productos)->with('categorias',$categorias)->with('categories',$categories);
    }

    public function detail($slug){
        if(!(Producto::where('slug',$slug)->exists())){
            return redirect('/');
        }

        $id=Producto::where('slug',$slug)->sum('id');
        $visible=Producto::find($id);

        if($visible['visible']==0){
           return redirect('/');
        }

        $producto=Producto::join('categorias_productos','productos.id','=','categorias_productos.producto_id')
        ->join('categorias','categorias_productos.categoria_id','=','categorias.id')->where('productos.id',$id)
        ->select('productos.id','nombre_categoria','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','precio_envio','img_principal','descripcion','slug')->get();

        if($producto=="[]"){
           return redirect('/');
        }
    
        $productos_relacionados=Producto::join('categorias_productos','productos.id','=','categorias_productos.producto_id')
        ->join('categorias','categorias_productos.categoria_id','=','categorias.id')
        ->where('productos.id','!=',$id)
        ->where('slug','!=',null)
        ->where('nombre_categoria',$producto[0]->nombre_categoria)->where('visible',1)
        ->select('productos.id','nombre_categoria','titulo','precio_no_afiliados','precio_afiliados','indicador_promocion','precio_promocion','precio_envio','img_principal','descripcion','slug')->get();

        $imagenes=Productos_Foto::where('producto_id',$id)->get();


        $collection = collect([["imagenes"=>$imagenes]]);
        $producto = $producto->concat($collection);
        
       return view('shop-detail')->with('producto',$producto)->with('productos_relacionados',$productos_relacionados)->with('imagenes',$imagenes);
    }

    public function home(){

        //RANDOM PRODUCTOS AL INICIO
        $productos=Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                    ->select('productos.id','nombre_categoria','titulo','precio_no_afiliados','img_principal','precio_envio','descripcion','slug')->where('visible',1)->inRandomOrder()->get(4);

        return view('home')->with('productos',$productos);
    }

    public function filter(Request $request){
        try {

            $categorias = $request->categorias;
            $productos=Producto::where('visible',1)
            ->where('slug','!=',null)
            ->join('categorias_productos','productos.id','=','categorias_productos.producto_id')
            ->join('categorias','categorias_productos.categoria_id','=','categorias.id')
            ->select('productos.id','nombre_categoria','categorias.id AS categoria_id','titulo','precio_no_afiliados','precio_afiliados','precio_envio','indicador_promocion','precio_promocion','img_principal','descripcion','slug')
            ->when($categorias, function ($query, $categorias) {
                return $query->whereIn('categorias.id', $categorias);
            }) 
            ->latest('productos.id')
            ->get();

            $productos = $productos->unique();

            return response()->json([
                'status' => 'success',
                'productos' => $productos
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 500);
        }
    }


    public function filterSubcategory(Request $request){
        try {

            $subcategory = $request->subcategory;
            $productos=Producto::where('visible',1)
            ->where('slug','!=',null)
            ->with('SubCategoriaRelationship')
            ->whereHas('SubCategoriaRelationship', function($query) use ($subcategory) {
                $query
                ->whereIn('subcategoria_id',$subcategory);
            })
            ->get();



            $awards = $productos->unique();
            $product =  $this->filterSubcategoryCheck($awards,$subcategory);
            return response()->json([
                'status' => 'success',
                'cantidad' => count($product),
                'productos' => $product
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 500);
        }
    }

    protected function filterSubcategoryCheck($awards,$subcategory)
    {
        $product_get= [];
        foreach ($awards as $product) {
            $for_cont = 0;
                foreach ($product->SubCategoriaRelationship as $value) {
                    if (in_array($value->subcategoria_id, $subcategory)) {
                        $for_cont++;
                    }
                }
                if($for_cont == count($subcategory)){
                    array_push($product_get, $product);
                }
        }
        return $product_get;
    }







    // PAYMENT

    public function paymentWebpayHistory(Request $request){

        $ticket = $request->ticket;
        $venta = Venta::where('ticket',$ticket)->first();
        $total = $venta->total;
        $returnUrl= url("/check-pay?ticket={$ticket}");
        $user_webpay = Auth::id() ;
        Suscripcion::payment();
        $response = Transaction::create($ticket, $user_webpay , $total, $returnUrl);
        return response()->json(['status' => 'success','response' => $response]);
    }

    public function paymentWebpay(Request $request){

        if (Auth::check()) {
            $objetos_productos=$request->arr_cart_productss;
            $total=$request->total;
        }else{
            $objetos_productos=$request->payload["arr_cart_productss"];
            $total=$request->payload["total"];
        }


        $ticket=date("Ymd").rand(5, 1000);


        if (!Auth::check()) {
            // $user_not_register=Cliente_No_Registrado::create(array_merge($request->only('names','email','phone','region', 'comuna', 'calle','nrocalle',	'nrocasa','referencia')));
            $user_not_register  = New Cliente_No_Registrado();
            $user_not_register->names = $request->payload["name"];
            $user_not_register->email = $request->payload["email"];
            $user_not_register->phone = $request->payload["phone"];
            $user_not_register->region = $request->payload["region"];
            $user_not_register->comuna = $request->payload["comuna"];
            $user_not_register->calle = $request->payload["calle_avenida"];
            $user_not_register->nrocalle = $request->payload["numero"];
            
            if($request->payload['nrocasa']==""){
                $user_not_register->nrocasa=null;
            }else{
                $user_not_register->nrocasa=$request->payload['nrocasa'];
            }

            if($request->payload['referencia']==""){
                $user_not_register->referencia=null;
            }else{
                $user_not_register->referencia=$request->payload['referencia'];
            }

            $user_not_register->save();

        }


        foreach($objetos_productos as $producto) {
            //OBTENER ID PRODUCTO
            // $id_producto=Producto::whereTitulo($producto['titulo'])->where('img_principal',$producto['img'])->sum('id');
            $id_producto=Producto::find($producto['id'])->id;
            $venta = new Venta();
            $venta->ticket=$ticket;
            $venta->cantidad=$producto['unit'];
            $venta->sub_total=$producto['total'];
            $venta->total=$total;
            $venta->producto_id=$id_producto;
            if (Auth::check()) {
                $venta->user_id=\Auth::id();
            }else{
                $venta->user_not_register_id= $user_not_register->id;
            }
            $venta->estado=0;
             if (Auth::check()) {
                $venta->name=\Auth::user()->name;
             }
            else{
                $venta->name=$user_not_register->names;
            }
            $venta->save();
        }
        $returnUrl= url("/check-pay?ticket={$ticket}");
        $user_webpay = Auth::check() ? Auth::id() : $user_not_register->id;

        Suscripcion::payment();
        $response = Transaction::create($ticket, $user_webpay , $total, $returnUrl);
        return response()->json(['status' => 'success','response' => $response]);

    }

    public function checkWebpay(Request $request){

        Suscripcion::payment();

        if($request->token_ws){
            $response = Transaction::commit($request->token_ws);
            if ($response->getResponseCode() == 0) {
                $ventas = Venta::where('ticket',$request->ticket)->update(['estado' => 1]);
                $ventas = Venta:: where('ticket',$request->ticket)->with('productos')->get();
                $user = User::find($ventas[0]->user_id);
                if($user != null){
                    Auth::login($user, true);
                    Mail::to(Auth::user()->email)->send(new ShopBuyMail($user, $ventas));
                    Mail::to("serviciocliente@petcicla.cl")->send(new NotificationPetcicla($user, $ventas , 1));
                    return redirect('/success/'.$ventas[0]->ticket)->with('ventas', $ventas);
                }else{

                    $user = Cliente_No_Registrado::find($ventas[0]->user_not_register_id);
                    Mail::to($user->email)->send(new ShopBuyMail($user, $ventas));
                    Mail::to("serviciocliente@petcicla.cl")->send(new NotificationPetcicla($user, $ventas , 1));
                    return redirect('/success-invite/'.$ventas[0]->ticket)->with('ventas', $ventas);
                }
            }else{
                $ventas = Venta:: where('ticket',$request->ticket)->get();
                return redirect('/error/'.$ventas[0]->ticket)->with('ventas', $ventas);
            }


        }else{
            // $ventas = Venta::where('ticket',$request->ticket)->delete();
            return redirect('/');
        }
    }


    public function compra_cart(Request $request){

        $objetos_productos=$request->arr_cart_productss;
        $total=$request->total;
        $ticket=date("Ymd").rand(5, 1000000);

        foreach($objetos_productos as $producto) {
            //OBTENER ID PRODUCTO
            $id_producto=Producto::whereTitulo($producto['titulo'])->where('img_principal',$producto['img'])->sum('id');
            $venta = new Venta();
            $venta->ticket=$ticket;
            $venta->cantidad=$producto['unit'];
            $venta->sub_total=$producto['total'];
            $venta->total=$total;
            $venta->producto_id=$id_producto;
            $venta->user_id=\Auth::id();
            $venta->estado=0;
            $venta->name=\Auth::user()->name;
            $venta->save();
        }

        return response()->json(['success']);
    }

    public function successPay(Request $request,$ticket)
    {
        if(!$request->suscripcion){
            $ventas = Venta::where('ticket',$ticket)->with('productos')->get();
            $suscripcion = false;
        }else{
            $ventas = Suscripcion::where('nro_suscripcion',$request->ticket)->get();
            $suscripcion = true;
        }
            
        return view('common.success')->with('ventas',$ventas)->with('suscripcion',$suscripcion);
    }

    public function errorPay(Request $request,$ticket)
    {
        if(!$request->suscripcion){
            $ventas = Venta::where('ticket',$ticket)->with('productos')->get();
            $suscripcion = false;

        }else{
            $ventas = Suscripcion::where('nro_suscripcion',$request->ticket)->get();
            $suscripcion = true;

        }
        return view('common.error')->with('ventas',$ventas)->with('suscripcion',$suscripcion);
    }
}

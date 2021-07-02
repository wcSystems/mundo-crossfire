<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Suscripcion;
use App\Models\Venta;
use App\Models\Log_Admin;
use App\Models\Mensaje;
use App\Models\Cliente_No_Registrado;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;



class AdminController extends Controller
{
    //-----------VISTA PRINCIPAL DE ADMIN
    public function index()
    {

        $suscripciones=Suscripcion::count();
        $ventas=Venta::distinct('ticket')->count();

        return view('Admin.index',['suscripciones' => $suscripciones],['ventas' => $ventas]);
    }

    public function notificacionesAdmin(Request $request){


        $last_date=Log_Admin::latest()->first('created_at');

        $hoy=Carbon::now()->toDateTimeString();

        
        $venta= $last_date != null ? Venta::distinct('ticket')->where('created_at', '>=', $last_date->created_at)->where('created_at', '<=', $hoy)->count() : 0;
        $mensajes=$last_date != null ? Mensaje::where('created_at', '>=', $last_date->created_at)->where('created_at', '<=', $hoy)->count() : 0;
        $suscripcion= $last_date != null ? Suscripcion::where('created_at', '>=', $last_date->created_at)->where('estado',1)->where('created_at', '<=', $hoy)->count() : 0;
        $cliente_no= $last_date != null ?Cliente_No_Registrado::where('created_at', '>', $last_date->created_at)->where('created_at', '<=', $hoy)->count() : 0;
        $cliente= $last_date != null ? User::where('role_id',3)->where('created_at', '>=', $last_date->created_at)->where('created_at', '<=', $hoy)->count() : 0;

        return response()->json(['venta' => $venta,
                                'cliente_registrados' => $cliente,
                                'suscripciones' => $suscripcion,
                                'mensajes'=> $mensajes,
                                'cliente_no'=>$cliente_no]);
    }

    public function logAdmin(Request $request){

        Log_Admin::latest()->delete();
        $now=Carbon::now()->toDateString();
        
        $log_admin = new Log_Admin;
        $log_admin->fecha = $now;
        $log_admin->save();

        return response()->json(['ok']);
    }
  
}

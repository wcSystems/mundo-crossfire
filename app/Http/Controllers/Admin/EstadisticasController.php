<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suscripcion;
use App\Models\Venta;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


class EstadisticasController extends Controller
{
    
    public function envioGraficas(){

        $Suscripcion=array();
        $Suscripcion[]=Suscripcion::whereDate('created_at','=',Carbon::now()->toDateString())->count();

        $venta=array();
        $venta[]=Venta::whereDate('created_at','=',Carbon::now()->toDateString())->distinct('ticket')->count();
        

        for ($i=1;$i<=6;$i++){
            $Suscripcion[]=Suscripcion::whereDate('created_at','=',Carbon::now()->subDays($i)->toDateString())->count();
            $venta[]=Venta::whereDate('created_at','=',Carbon::now()->subDays($i)->toDateString())->distinct('ticket')->count();
           
        }

        $Suscripcion=array_reverse($Suscripcion);
        $Ventas=array_reverse($venta);

        return response()->json([
            'Suscripcion'=>$Suscripcion,
            'Ventas'=>$Ventas
            ]);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Transbank\Webpay\WebpayPlus;


class Suscripcion extends Model
{
    use HasFactory;

    public $table = 'suscripciones';

    protected $fillable = [
        'user_id',
        'paquete_id',
        'dia_visita',
        'semana_visita',
        'nro_suscripcion',
        'region',
        'comuna',
        'calle_avenida',
        'numero',
        'estado',
        'tiempo',
        'nrocasa',
        'referencia',
        'mascotas'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function payment(){
        // WebpayPlus::setCommerceCode('597055555532');
        // WebpayPlus::setApiKey('579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
        // WebpayPlus::setIntegrationType('TEST');
       WebpayPlus::setCommerceCode('597036250666');
        WebpayPlus::setApiKey('21aebc18fc7d8d486db9a954f2754e38');
        WebpayPlus::setIntegrationType('LIVE');
        return;
    }




}

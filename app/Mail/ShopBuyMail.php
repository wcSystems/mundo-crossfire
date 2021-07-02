<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopBuyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $venta;
    protected $type  = 'notification';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user , $venta)
    {
        $this->type =  'notification';
        $this->user=$user;
        $this->venta=$venta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('notificaciones@filtalent.com')
        ->subject('Compra Realizada Exitosamente - Petcicla')
        ->view('mail.shop')
        ->with([
            'type'=> $this->type,
        ]);
    }
}

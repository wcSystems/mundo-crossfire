<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationPetcicla extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $venta;
    public $type_send;
    protected $type  = 'notification';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$venta,$type)
    {
        $this->type =  'notification';
        $this->user=$user;
        $this->venta=$venta;
        $this->type_send=$type;

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
        ->subject('Petcicla - Nueva Notificación')
        ->view('mail.petcicla')
        ->with([
            'type'=> $this->type,
        ]);
    }
}

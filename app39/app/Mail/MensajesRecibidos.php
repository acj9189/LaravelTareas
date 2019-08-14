<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensajesRecibidos extends Mailable {
    use Queueable, SerializesModels;

    public $subject = 'Mensaje de contacto';
    public $mensaje;

    public function __construct($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function build() {
        return $this->view('emails.mensajes-recibidos');
    }
}

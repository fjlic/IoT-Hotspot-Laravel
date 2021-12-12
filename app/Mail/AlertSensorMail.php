<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Alert;
use App\HistorialSensor;

class AlertSensorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Alerta de Sensor';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $alerts = Alert::all();
        $sensor = HistorialSensor::all();
        $sensor = $sensor->last();
        return $this->markdown('module.email.sensor', compact('alerts','sensor'));
    }
}

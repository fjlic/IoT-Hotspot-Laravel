<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Alert;
use App\Models\HistorialSensor;

class AlertSensorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Sensor Alert';

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
        $alert = Alert::find(1)->where('type', 'sensor')->first();
        $sensor = HistorialSensor::all();
        $sensor = $sensor->last();
        return $this->markdown('modules.email.sensor', compact('alert','sensor'));
    }
}

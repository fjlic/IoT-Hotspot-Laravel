<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    //
    /**
     * Place your BotMan logic here.
     */

    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'hola') {
                $this->askName($botman);
            }else{
                $botman->reply("Escribe 'hola' para iniciar la conversacion...");
            }
        });
        $botman->listen();
    }
    /**
     * Place your BotMan logic here.
     */

    public function askName($botman)
    {
        $botman->ask('Hola!! Cual es tu nombre?', function(Answer $answer) {
            $name = $answer->getText();
            $this->say('Mucho gusto '.$name);
        });
    }
}

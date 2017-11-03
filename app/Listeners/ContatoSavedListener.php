<?php

namespace App\Listeners;

use App\Mail\ContatoSaved as ContatoSavedMail;
use App\Events\ContatoSaved as ContatoSavedEvent;
use Illuminate\Support\Facades\Mail;

class ContatoSavedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ContatoSaved  $event
     * @return void
     */
    public function handle(ContatoSavedEvent $event)
    {

        Mail::to('bd55537cb6-35fffd@inbox.mailtrap.io')
            ->subject('Contato Novo')
            ->send(new ContatoSavedMail($event->contato));
    }

}

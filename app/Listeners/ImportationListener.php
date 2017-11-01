<?php

namespace App\Listeners;

use App\Events\Importation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ImportationListener implements ShouldQueue
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
     * @param  Importation  $event
     * @return void
     */
    public function handle(Importation $event)
    {
        //
    }
}

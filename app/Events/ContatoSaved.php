<?php
/**
 * Created by PhpStorm.
 * User: hoheckell
 * Date: 02/11/17
 * Time: 17:59
 */

namespace App\Events;


use App\Contato;
use Illuminate\Queue\SerializesModels;

class ContatoSaved
{
    use SerializesModels;

    public $contato;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }
}
<?php

namespace App\Mail;

use App\Contato;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContatoSaved extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $contato;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contatosaved')
            ->with([
                'name' => $this->contato->name,
                'email' => $this->contato->email,
                'telefone' => $this->contato->telefone,
                'endereco' => $this->contato->endereco,
                'facebook' => $this->contato->facebook,
                'data' => $this->contato->created_at->format('d/m/Y H:i:s'),
            ]);
    }
}

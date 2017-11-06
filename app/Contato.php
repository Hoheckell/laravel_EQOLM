<?php

namespace App;

use App\Events\ContatoSaved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contato extends Model
{
    use Notifiable;

    protected $table = 'contatos';

    protected $fillable = [
        'name',
        'email',
        'telefone',
        'endereco',
        'facebook'
    ];

    protected $dispatchesEvents = [
        'saved' => ContatoSaved::class
    ];
}

<?php

namespace App;

use App\Events\ContatoSaved;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

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

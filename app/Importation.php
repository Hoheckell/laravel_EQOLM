<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Importation extends Model
{
   protected $table = 'importations';

   protected $fillable = [
       'name'
   ];

}

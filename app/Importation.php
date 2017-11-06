<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Importation extends Model
{
    use Notifiable;

   protected $table = 'importations';

   protected $fillable = [
       'name'
   ];



   // Deve haver -> use Notifiable;
    public function routeNotificationForMail()
    {
        // return $this->email_address;
        return 'hoheckell.info@gmail.com';
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: hoheckell
 * Date: 02/11/17
 * Time: 20:18
 */

namespace App\Observers;
use App\Importation;
use App\Mail\ImportationAdded;
use Illuminate\Support\Facades\Mail;

class ImportationObserver
{
    public function created(Importation $importation)
    {

        Mail::to('bd55537cb6-35fffd@inbox.mailtrap.io')
            ->send(new ImportationAdded($importation));
    }

}
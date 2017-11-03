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

class ImportationObserver
{
    public function created(Importation $importation)
    {

        Mail::to('bd55537cb6-35fffd@inbox.mailtrap.io')
            ->subject('Importação nova')
            ->send(new ImportationAdded($importation));
    }

}
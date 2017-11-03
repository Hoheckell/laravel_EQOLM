<?php

namespace App\Mail;

use App\Importation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ImportationAdded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $importation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Importation $importation)
    {
        $this->importation = $importation;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = file(public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->importation->name);
        $linhas = count($file)-1;
        return $this->view('emails.importationadded')
            ->with([
                'name' => $this->importation->name,
                'linhas' => $linhas,
                'data' => $this->importation->created_at->format('d/m/Y H:i:s'),
            ]);
    }
}

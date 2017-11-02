<?php

namespace App\Jobs;

use App\Contato;
use App\Importation;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class ProcessFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $importations = Importation::where('imported', 0)->get();
            $file = NULL;
            if(!empty($importations)) {
                try {
                    foreach ($importations as $i) {
                        try {
                            if (empty($file)) {
                                $file = file(public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $i->name);
                                if ($i->totalines == 0) {
                                    $i->totalines = count($file);
                                }
                            }
                            if (($handle = fopen(public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $i->name, "r")) !== FALSE) {
                                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                                    $imported = Contato::create([
                                        'name' => $data[0],
                                        'email' => $data[1],
                                        'telefone' => $data[2],
                                        'endereco' => $data[3],
                                        'faceboo' => $data[4],
                                    ]);
                                    $i->donelines += 1;
                                    $i->imported = 1;
                                    $i->save();
                                }
                                fclose($handle);
                            }
                            $file = NULL;
                        }catch (\Exception $e){
                            $i->error = 1;
                            $i->save();
                            Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());
                            echo $e->getMessage();
                        }
                    }
                }catch (\Exception $e){
                    Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());
                    echo $e->getMessage();
                }
            }

            Log::info("Arquivo " . $i->name . " importado com sucesso [" . date("Y-m-d H:i:s") . "]");
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }


}

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


    protected $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model){

        $this->model = $model;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            if (!empty($this->model)) {
                try {
                    $file = NULL;
                    try {
                        if (empty($file)) {
                            $file = file(public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->model->name);
                            if ($this->model->totalines == 0) {
                                $this->model->totalines = count($file) - 1;
                            }
                        }
                        if (($handle = fopen(public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->model->name, "r")) !== FALSE) {
                            $flag = true;
                            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                                if ($flag) {
                                    $flag = false;
                                    continue;
                                }
                                $imported = Contato::create([
                                    'name' => $data[0],
                                    'email' => $data[1],
                                    'telefone' => $data[2],
                                    'endereco' => $data[3],
                                    'facebook' => $data[4],
                                ]);
                                $this->model->donelines += 1;
                                $this->model->imported = 1;
                                $this->model->save();
                            }
                            fclose($handle);
                        } else {
                            Log::error("Falha ao abrir arquivo [" . date("Y-m-d H:i:s") . "]");
                        }
                        $file = NULL;
                    } catch (\Exception $e) {
                        $i->error = 1;
                        $i->save();
                        Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
                        echo $e->getMessage();
                    }
                } catch (\Exception $e) {
                    Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
                    echo $e->getMessage();
                }
            } else {
                Log::info("Job Iniciado [sem importações - " . date("Y-m-d H:i:s") . "]");
            }
            Log::info("JOB [ProcessFile] realizado com sucesso [" . date("Y-m-d H:i:s") . "]");

        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }


}

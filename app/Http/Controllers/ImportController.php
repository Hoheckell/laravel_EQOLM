<?php

namespace App\Http\Controllers;

use App\Console\Commands\ImportFilesCommand;
use App\Importation;
use App\Jobs\ProcessFile;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Mockery\Exception;

class ImportController extends Controller
{
    public function index(){

        return view('upload');

    }
    public function upload(Request $request){

        try {

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'files';
                $extension = $file->getClientOriginalExtension();
                $fileName = 'file_' . date('d_m_Y_h_i_s') . "_." . $extension;

                Importation::create([
                    'name' => $fileName
                ]);
                //var_dump($file->move($destinationPath.DIRECTORY_SEPARATOR.'tmp'));
                $file->move($destinationPath, $fileName);
                $job = (new ProcessFile())->delay(Carbon::now()->addMinute());
                $this->dispatch($job);
            }

        }catch (Exception $e){
            die($e->getMessage());
        }

        return redirect()->back()->with('success',"Arquivo Agendado apra importação");

    }


}

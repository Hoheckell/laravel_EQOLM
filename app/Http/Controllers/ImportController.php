<?php

namespace App\Http\Controllers;

use App\Classes\AgentClass;
use App\Importation;
use App\Jobs\ProcessFile;
use App\Notifications\TestNotification;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use Nexmo\Laravel\Facade\Nexmo;

class ImportController extends Controller
{
    public function index(Schedule $schedule){

        /* TEST SMS
//        Nexmo::message()->send([
//            'to'   => '5585988511209',
//            'from' => '5585988511209',
//            'text' => 'Using the facade to send a message.'
//        ]);
        */
        return view('upload');

    }
    public function upload(Request $request){

        try {

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'files';
                $extension = $file->getClientOriginalExtension();
                $fileName = 'file_' . date('d_m_Y_h_i_s') . "_." . $extension;

                if($file->move($destinationPath, $fileName)) {
                    $importation = Importation::create([
                        'name' => $fileName
                    ]);

                    //Deve Haver o email de destino especificado no model caso seja enviado por email
                    $importation->notify(new TestNotification($importation));


                    $job = (new ProcessFile($importation))->delay(Carbon::now()->addMinute());
                    $this->dispatch($job);
                }
            }

        }catch (Exception $e){
            die($e->getMessage());
        }

        return redirect('/importations')->with('success',"Arquivo Agendado apra importação");

    }

    public function importations(){
        $data = [
            'importations'=>Importation::all()
        ];
        return view('importations',$data);
    }


}

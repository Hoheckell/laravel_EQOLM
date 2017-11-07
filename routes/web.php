<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Carbon\Carbon;

Route::get('/', "ImportController@index");
Route::post('/upload', 'ImportController@upload');
Route::get('/importations', 'ImportController@importations');
Route::resource('contato', 'ContatoController');

Route::get('readnoty/{id}',function($id){
    $imp = \App\Importation::find($id);
    $imp->unreadNotifications()->update(['read_at' => Carbon::now()]);
    return redirect()->back();
});

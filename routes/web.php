<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

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

// le rotte di "guest" verrano gestite da Vue quindi QUI non servono più 
// Route::get('/', function () {
//     return view('guest.home');
// })->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('index');

Route::middleware('auth')
        //la cartella che contiene i nostri controller 'auth'
        ->namespace('Admin')
        // tutti i percorsi (name) dovranno iniziare per 'admin.'
        ->name('admin.')
        // prefix
        ->prefix('admin')
        ->group(function(){
            // QUI METTIAMO LE ROTTE NUOVE protette da password che ereditano le istruzioni che abbiamo scritto prima
            // tutte avranno 'auth'
            // tutte avranno come namespace 'Admin'
            
            // in automatico tutte le rotte avranno...
            // ...come 1° parametro "Admin/..."
            // ...come 2° parametro il nuovo controller
            Route::get('/', 'HomeController@index')->name('index');

            Route::resource('/posts', 'PostController');
        });

/*** QUESTA rotta si mette DOPO perchè la lettura delle rotte è fatta dall'alto verso il basso ***/

// MENTRE per qualsiasi altra rotta...
// restituiscimi la vista home di guest
// dove "any" (che è una variabile) è qualsiasi altra cosa (.*)
Route::get('{any?}', function(){
    return view('guest.home');
})->where('any', '.*')->name('home');

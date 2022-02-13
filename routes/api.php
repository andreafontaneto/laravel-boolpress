<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/***
LE ROTTE con middleware non servono perchè la vista essendo pubblica non ha bisogno di dati privati
***/


/*** TEST API ROUTE ***/
// quindi faccio un altra rotta normale
// tutte le rotte inserite qui in "api.php" avranno come prefisso "api/..." (es. api/prova)
Route::get('prova', function(){

    // posso salvare il mio array dentro $data o restituirlo direttamente tramite ->json([...])
    // $data = [
    //     "name" => "Andrea", 
    //     "lastname" => "Fontaneto"
    // ];

    // non c'è relazione tra il nome della variabile e quello che viene stampato
    // viene stampato direttamente l'array
    $user = [
        "name" => "Andrea", 
        "lastname" => "Fontaneto",
        "hobbies" => [
            'coding',
            'music',
            'graphic'
        ]
    ];

    // aggiungo un dato
    $status = 'OK';

    // response()->json() trasformerà l'array passante in un file JSON
    // return response()->json($user);

    // con compact() trasformerà l'array in un oggetto aggiungendo un livello in più
    // return response()->json(compact('user'));

    // posso anche passare più dati
    return response()->json(compact('status', 'user'));
});

/*** API ROUTE ***/
Route::get('posts', 'Api\PostController@index');

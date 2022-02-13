<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        // $posts = Post::all();
        // $posts = Post::paginate(5);

        // passo le categorie e i tags ai miei post
        $posts = Post::with(['category', 'tags'])->paginate(5);

        return response()->json($posts); // JSON diretto
        // return response()->json(compact('posts')); // oggetto posts tramite JSON

    }

    // genero un file JSON del singolo post in base allo slug
    // quindi guardando le regole REST creo (oltre alla index) anche un funzione show()
    // gli passo un paramentro "slug" (perchè lo show RICHIEDE per forza un parametro)
    public function show($slug){

        // recupero tutti i post DOVE (where) lo slug contenuto nella colonna 'slug' è uguale allo $slug che gli passo
        // dopodichè da tutti i post recuperati prendo SOLO IL PRIMO ( ->first() )
        // aggiungo with() e gli passo le categorie + i tags per poi visualizzarli in pagina
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        // faccio un controllo per vedere SE NON ESISTE il post
        if(!$post){
            $post = [
                'title' => 'Post non trovato',
                'content' => ''
            ];
        }

        // adesso genero il JSON
        return response()->json($post);
    }
}

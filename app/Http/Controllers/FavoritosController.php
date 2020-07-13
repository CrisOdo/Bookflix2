<?php

namespace App\Http\Controllers;

use App\Favorito;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Perfil;
use App\Book;

class FavoritosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {      
      $usuario = Auth::user();
      $perfil=$usuario->perfilElegido;
      $perfilElegido = Perfil::find($perfil);   
      $favorito = $perfilElegido->favoritos_id;
      $objetoFavorito = Favorito::find($favorito); 
      $lista = $objetoFavorito->books;       
      $cantidad = $objetoFavorito->cantidad;      
      return view('user.favoritos.index', compact('lista','cantidad'));
    }  
   
    public function marcarFavorito($id)
    {      
      $usuario = Auth::user();
      $perfil=$usuario->perfilElegido;
      $perfilElegido = Perfil::find($perfil);   
      $favorito = $perfilElegido->favoritos_id;
      $objetoFavorito = Favorito::find($favorito);
      
      $libro = Book::find($id);
      $listaFavoritos = $objetoFavorito->books;    
      $tamaño = count($listaFavoritos);
      $listaFavoritos[$tamaño] = $libro;
      $nro = $objetoFavorito->cantidad + 1; 

      $objetoFavorito->update([
        'books' => $listaFavoritos,
        'cantidad'=> $nro,
      ]);  
      
      return Redirect::back();
    }

    public function desmarcarFavorito($id)
    {      
      $usuario = Auth::user();
      $perfil=$usuario->perfilElegido;
      $perfilElegido = Perfil::find($perfil);   
      $favorito = $perfilElegido->favoritos_id;
      $objetoFavorito = Favorito::find($favorito);
      
      $libro = Book::find($id);
      $listaFavoritos = $objetoFavorito->books;    
      $cantidad = $objetoFavorito->cantidad;
      
      $i=0;
      while ($libro->id != $listaFavoritos[$i]['id']) {
        $i = $i + 1;
      }
      unset($listaFavoritos[$i]);

      $cantidad = $cantidad - 1;       
      $listado = array_values($listaFavoritos);
      
      $objetoFavorito->update([
        'books' => $listado,
        'cantidad'=> $cantidad,
      ]);  
      
      return Redirect::back();
    }
    
}

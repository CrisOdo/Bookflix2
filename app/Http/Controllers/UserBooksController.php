<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Book;
use App\Author;
use App\Editorial;
use App\Genre;
use App\User;
use App\Historial;
use App\Favorito;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class UserBooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $user = Auth::user();
      $libros = Book::orderBy('created_at', 'DESC')->get();
     
      $perfil=$user->perfilElegido;
      $perfilElegido = Perfil::find($perfil);   
      $favorito = $perfilElegido->favoritos_id;
      $objetoFavorito = Favorito::find($favorito);    
      $lista = $objetoFavorito->books;       
      $cantidad = $objetoFavorito->cantidad; 

      return view('user.book.index', compact('libros','user','lista','cantidad'));
    }

    public function view($id)
    {
      $libro = Book::find($id);

      $pathToFile = 'C:/Users/Administrator/Bookflix/storage/app/public/'. $libro->archivo;

      return response()->file($pathToFile);
    }

    

    public function viewAdelanto($id)
    {
      $libro = Book::find($id);
      $pathToFile = 'C:/Users/Administrator/Bookflix/storage/app/public/'. $libro->adelanto;
      return response()->file($pathToFile);
    }

    public function search(Request $request)
    {
      $s = $request->input('s');  
      $libros = Book::search($s)->get();
      return view('user.book.search', compact('libros'));
    }

    public function leido($id)
    {      
      $usuario = Auth::user();
      $libro = Book::find($id);
      $librosTerminados = $usuario->librosTerminados;    
      $tamaño = count($librosTerminados);
      $librosTerminados[$tamaño] = $libro;      
      $usuario->update([
        'librosTerminados' => $librosTerminados,
      ]);
      $nro = $libro->vecesTerminado +1;
      $libro->update([
        'vecesTerminado' => $nro,
      ]);
      
      return Redirect::back();
    }

    public function show($id)
    {
      $libro = Book::find($id);
      $autor = Author::find($libro->author_id);
      $genero = Genre::find($libro->genre_id);
      $editorial = Editorial::find($libro->editorial_id);

      $miId = Auth::user()->id;
      $user = User::find($miId);

      $librosTerminados = $user->librosTerminados;
      $tamaño = count($librosTerminados);
      $leido=false;
      $i=0;      
      while ($leido == false && $i < $tamaño) {        
        if ($librosTerminados[$i]['id'] == $id) {             
          $leido=true;
        } 
           $i=$i +1;                
      }
    

      $perfilElegido_id = $user->perfilElegido;
      $perfilElegido = Perfil::find($perfilElegido_id);
      $historial = Historial::find($perfilElegido->historial_id);
      $listado = $historial->books;
      $cantidad = $historial->cantidad;  
      $listado[$cantidad] = $libro;
      $cantidad = $cantidad + 1;
      $historial->update([
        'books' => $listado,
        'cantidad' =>$cantidad,
      ]);
      
      return view('user.book.show', compact('libro', 'user', 'autor', 'genero', 'editorial','leido'));
    }
}    

<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Editorial;
use App\Genre;
use App\User;
use App\Historial;
use Auth;
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
      $libros = Book::orderBy('created_at', 'DESC')->get();
      return view('user.book.index', compact('libros'));
    }

    public function view($id)
    {
      $libro = Book::find($id);

      $pathToFile = 'C:/Users/Administrator/Bookflix/storage/app/public/'. $libro->archivo;

      return response()->file($pathToFile);
    }


    public function show($id)
    {
      $libro = Book::find($id);
      $autor = Author::find($libro->author_id);
      $genero = Genre::find($libro->genre_id);
      $editorial = Editorial::find($libro->editorial_id);

      $miId = Auth::user()->id;
      $user = User::find($miId);

      $historial = Historial::find($user->historial_id);
      $listado = $historial->books;
      $cantidad = $historial->cantidad;  
      $listado[$cantidad] = $libro;
      $cantidad = $cantidad + 1;
      $historial->update([
        'books' => $listado,
        'cantidad' =>$cantidad,
      ]);
      
      return view('user.book.show', compact('libro', 'autor', 'genero', 'editorial'));
    }
}    

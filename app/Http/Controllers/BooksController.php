<?php

namespace App\Http\Controllers;

use App\Author;
use App\Editorial;
use App\Genre;
use App\Book;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class BooksController extends Controller
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

    public function index(){
      $libros=Book::orderBy('created_at','DESC')->get();
      return view('book.index', compact('libros'));
    }

    public function success(){
      $libros=Book::orderBy('created_at','DESC')->get();
      return view('book.success', compact('libros'));
    }

  public function create()
  {
    $autores=Author::all();
    $generos=Genre::all();   
    $editoriales=Editorial::all();
    return view('book.create', compact('autores','generos','editoriales'));
  }

  public function store()
  {    
    $data = request()->validate([
      'name' => 'required',
      'isbn' => 'required',
      'description' => 'required',
      'genre_id' => 'required',
      'author_id' => 'required',      
      'editorial_id' => 'required',      
      'image' => 'image',
      'archivo' => 'mimes:pdf',      
    ]);

      $imagePath = request('image')->store('uploads','public');
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1600);
      $image->save();

      $filePath = request('archivo')->store('uploads','public');

    \App\Book::create([
      'name' => $data['name'],
      'isbn' => $data['isbn'],
      'description' => $data['description'],
      'genre_id' => $data['genre_id'] ,
      'author_id' => $data['author_id'],      
      'editorial_id' => $data['editorial_id'],      
      'image' => $imagePath,      
      'archivo' => $filePath, 
    ]);
    
    
    return redirect('/book/success');

  }
}
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
use Auth;

class BooksController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $libros = Book::orderBy('created_at', 'DESC')->get();
    return view('admin.book.index', compact('libros'));
  }

  public function success()
  {
    $libros = Book::orderBy('created_at', 'DESC')->get();
    return view('admin.book.success', compact('libros'));
  }

  public function create()
  {
    $autores = Author::all();
    $generos = Genre::all();
    $editoriales = Editorial::all();
    return view('admin.book.create', compact('autores', 'generos', 'editoriales'));
  }

  public function store()
  {
    $data = request()->validate([
      'name' => ['required','unique:books'],
      'isbn' => ['required','unique:books'],
      'description' => ['required', 'min:30'],
      'genre_id' => 'required',
      'author_id' => 'required',
      'editorial_id' => 'required',
      'image' => ['required', 'image'],
      'archivo' =>['required', 'mimes:pdf'], 
    ]);
    
    $imagePath = request('image')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
    $image->save();
    $filePath = request('archivo')->store('uploads', 'public');

      $newBook=\App\Book::create([
        'name' => $data['name'],
        'isbn' => $data['isbn'],
        'description' => $data['description'],
        'genre_id' => $data['genre_id'],
        'author_id' => $data['author_id'],
        'editorial_id' => $data['editorial_id'],
        'image' => $imagePath,
        'chapters' =>[],
        'cantidad' =>0,
        'archivo' => $filePath,
      ]);
   
      
    return redirect('/book/success');
  }
  public function edit($idLibro)
  {
    $autores = Author::all();
    $generos = Genre::all();
    $editoriales = Editorial::all();
    $libro = Book::find($idLibro);
    return view('admin.book.edit', compact('libro', 'autores', 'generos', 'editoriales'));
  }
  public function update($idLibro)
  {
    $data = request()->validate([
      'description' => ['required', 'min:30'],
      'genre_id' => 'required',
      'author_id' => 'required',
      'editorial_id' => 'required',
      'image' => ['required', 'image'],
      'archivo' => 'mimes:pdf',
    ]);

    $imagePath = request('image')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
    $image->save();

    $libro = Book::find($idLibro);

    if (request('archivo') == null) {
      $libro->update([
        'description' => $data['description'],
        'genre_id' => $data['genre_id'],
        'author_id' => $data['author_id'],
        'editorial_id' => $data['editorial_id'],
        'image' => $imagePath,
      ]);
    } else {
      $filePath = request('archivo')->store('uploads', 'public');
      $libro->update([
        'description' => $data['description'],
        'genre_id' => $data['genre_id'],
        'author_id' => $data['author_id'],
        'editorial_id' => $data['editorial_id'],
        'image' => $imagePath,
        'archivo' => $filePath,
      ]);
    }
    return redirect("/book/modified");
 
}
  public function modified()
  {
    return view('admin.book.modified');
  }
}

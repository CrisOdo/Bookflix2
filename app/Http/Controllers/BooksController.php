<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Carbon\Traits\Date;
use DateTime;
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

  public function type()
  {
    return view('admin.book.type');
  }


  public function selectedType()
  {
    if (request('type_id') == 1) {
      $autores = Author::all();
      $generos = Genre::all();
      $editoriales = Editorial::all();
      return view('admin.book.createEntero', compact('autores', 'generos', 'editoriales'));
    } else {
      $autores = Author::all();
      $generos = Genre::all();
      $editoriales = Editorial::all();
      return view('admin.book.createCapitulos', compact('autores', 'generos', 'editoriales'));
    }
  }

  public function storeE()
  {
    $data = request()->validate([
      'name' => ['required', 'unique:books'],
      'isbn' => ['required', 'unique:books'],
      'description' => ['required', 'min:30'],
      'genre_id' => 'required',
      'author_id' => 'required',
      'editorial_id' => 'required',
      'image' => ['required', 'image'],
      'archivo' => ['required', 'mimes:pdf'],
      'disponibleDesde' => ['required', 'date', 'after_or_equal:today'],
      'disponibleHasta' => ['required', 'date', 'after_or_equal:tomorrow'],
      'adelanto' => ['required', 'mimes:pdf'],
    ]);

    $imagePath = request('image')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
    $image->save();
    $filePath = request('archivo')->store('uploads', 'public');
    $filePath2 = request('adelanto')->store('uploads', 'public');

    $newBook = \App\Book::create([
      'name' => $data['name'],
      'isbn' => $data['isbn'],
      'description' => $data['description'],
      'genre_id' => $data['genre_id'],
      'author_id' => $data['author_id'],
      'editorial_id' => $data['editorial_id'],
      'image' => $imagePath,
      'chapters' => [],
      'cantidad' => 0,
      'archivo' => $filePath,
      'validoDesde' => $data['disponibleDesde'],
      'validoHasta' => $data['disponibleHasta'],
      'adelanto' => $filePath2,
      'vecesTerminado' => 0,
      'cantidadComentarios' => 0,
      'comentarios' => [],      
    ]);

    return redirect('/book/success');
  }

  public function storeC()
  {
    $data = request()->validate([
      'name' => ['required', 'unique:books'],
      'isbn' => ['required', 'unique:books'],
      'description' => ['required', 'min:30'],
      'genre_id' => 'required',
      'author_id' => 'required',
      'editorial_id' => 'required',
      'image' => ['required', 'image'],
      'archivo' => ['required', 'mimes:pdf'],
      'disponibleDesde' => ['required', 'after_or_equal: today'],
      'disponibleHasta' => ['required', 'after_or_equal: tomorrow'],
      'adelanto' => ['required', 'mimes:pdf'],
      'totalCapitulos' => ['required', 'numeric'],
    ]);

    $imagePath = request('image')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
    $image->save();
    $filePath = request('archivo')->store('uploads', 'public');
    $filePath2 = request('adelanto')->store('uploads', 'public');


    $newBook = \App\Book::create([
      'name' => $data['name'],
      'isbn' => $data['isbn'],
      'description' => $data['description'],
      'genre_id' => $data['genre_id'],
      'author_id' => $data['author_id'],
      'editorial_id' => $data['editorial_id'],
      'image' => $imagePath,
      'chapters' => [],
      'cantidad' => 0,
      'archivo' => null,
      'validoDesde' => $data['disponibleDesde'],
      'validoHasta' => $data['disponibleHasta'],
      'adelanto' => $filePath2,
      'totalCapitulos'=> $data['totalCapitulos'],
      'vecesTerminado' => 0,
      'cantidadComentarios' => 0,
      'comentarios' => [],
    ]);

    $newChapter = \App\Chapter::create([
      'name' => "Capitulo 1",
      'book_id' => $newBook->id,
      'archivo' => $filePath,
    ]);

    $listado = $newBook->chapters;
    $cantidad = $newBook->cantidad;
    $listado[$cantidad] =  $newChapter;
    $newChapter->update([
      'miPosicion' => $cantidad,
    ]);
    $cantidad = $cantidad + 1;
    $newBook->update([
      'chapters' => $listado,
      'cantidad' => $cantidad,
    ]);


    return redirect('/book/success');
  }

  public function deleteAdelanto($id)
  {
    $book = Book::find($id);
    $book->update([
      'adelanto' => null,
    ]);
    return redirect("/book/index");
  }




  public function editE($idLibro)
  {
    $autores = Author::all();
    $generos = Genre::all();
    $editoriales = Editorial::all();
    $libro = Book::find($idLibro);
    return view('admin.book.editE', compact('libro', 'autores', 'generos', 'editoriales'));
  }
  public function updateE($idLibro)
  {
    $data = request()->validate([
      'description' => ['required', 'min:30'],
      'genre_id' => 'required',
      'author_id' => 'required',
      'editorial_id' => 'required',
      'image' => ['required', 'image'],
      'disponibleDesde' => ['required', 'after_or_equal: today'],
      'disponibleHasta' => ['required', 'after_or_equal: tomorrow'],
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
        'validoDesde' => $data['disponibleDesde'],
        'validoHasta' => $data['disponibleHasta'],
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
        'validoDesde' => $data['disponibleDesde'],
        'validoHasta' => $data['disponibleHasta'],
      ]);
    }
    return redirect("/book/modified");
  }
  public function modified()
  {
    return view('admin.book.modified');
  }


  public function editC($idLibro)
  {
    $autores = Author::all();
    $generos = Genre::all();
    $editoriales = Editorial::all();
    $libro = Book::find($idLibro);
    return view('admin.book.editC', compact('libro', 'autores', 'generos', 'editoriales'));
  }
  public function updateC($idLibro)
  {
    $data = request()->validate([
      'description' => ['required', 'min:30'],
      'genre_id' => 'required',
      'author_id' => 'required',
      'editorial_id' => 'required',
      'image' => ['required', 'image'],
      'disponibleDesde' => ['required', 'after_or_equal: today'],
      'disponibleHasta' => ['required', 'after_or_equal: tomorrow'],
    ]);

    $imagePath = request('image')->store('uploads', 'public');
    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
    $image->save();

    $libro = Book::find($idLibro);

    $libro->update([
      'description' => $data['description'],
      'genre_id' => $data['genre_id'],
      'author_id' => $data['author_id'],
      'editorial_id' => $data['editorial_id'],
      'image' => $imagePath,
      'validoDesde' => $data['disponibleDesde'],
      'validoHasta' => $data['disponibleHasta'],
    ]);

    return redirect("/book/modified");
  }

  public function confirm($id)
  {
    $libro = Book::find($id);
    return view('admin.book.delete', compact('libro'));
  }

  public function delete($id)
  {
    $libro = Book::find($id);
    $libro->delete();
    return redirect("/book/deleted");
  }

  public function deleted()
  {
    return view('admin.book.deleted');
  }
}

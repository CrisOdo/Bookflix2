<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
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
      $generos=Genre::orderBy('created_at','DESC')->get();
      return view('genre.index', compact('generos'));
    }
        
    public function create()
    {
      return view('genre.create');
    }

    public function store()
    {    
      $data = request()->validate([
        'name' => 'required',    
      ]);
  
      \App\Genre::create([
        'name' => $data['name'],
      ]);
  
      return redirect('/genre');
  
    }
}

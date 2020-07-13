<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenresController extends Controller
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

    public function index(){
      $generos=Genre::orderBy('created_at','DESC')->get();
      return view('admin.genre.index', compact('generos'));
    }

    public function success(){
      $generos=Genre::orderBy('created_at','DESC')->get();
      return view('admin.genre.success', compact('generos'));
    }
        
    public function create()
    {
      return view('admin.genre.create');
    }

    public function store()
    {    
      $data = request()->validate([
        'name' => ['required', 'unique:genres']
      ]);
  
      \App\Genre::create([
        'name' => $data['name'],
      ]);
  
      return Redirect::back();
  
    }
}

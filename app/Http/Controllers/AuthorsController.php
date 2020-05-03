<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
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
      $autores=Author::orderBy('created_at','DESC')->get();
      return view('author.index', compact('autores'));
    }
      
    public function create()
    {
      return view('author.create');
    }

    public function store()
    {    
      $data = request()->validate([
        'name' => 'required',    
      ]);
  
      \App\Author::create([
        'name' => $data['name'],
      ]);              

      return redirect('/author');
  
    }
}

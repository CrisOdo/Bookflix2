<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthorsController extends Controller
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
      $autores=Author::orderBy('created_at','DESC')->get();
      return view('admin.author.index', compact('autores'));
    }

    public function success(){
      $autores=Author::orderBy('created_at','DESC')->get();
      return view('admin.author.success', compact('autores'));
    }
      
    public function create()
    {
      return view('admin.author.create');
    }

    public function store()
    {    
      $data = request()->validate([
        'name' => ['required', 'unique:authors']
      ]);
  
      \App\Author::create([
        'name' => $data['name'],
      ]);              

      return Redirect::back();
  
    }
}

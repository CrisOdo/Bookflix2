<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;

class EditorialsController extends Controller
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
      $editoriales=Editorial::orderBy('created_at','DESC')->get();
      return view('editorial.index', compact('editoriales'));
    }
        
    public function create()
    {
      return view('editorial.create');
    }

    public function store()
    {    
      $data = request()->validate([
        'name' => 'required',    
      ]);
  
      \App\Editorial::create([
        'name' => $data['name'],
      ]);
  
      return redirect('/editorial');
  
    }
}

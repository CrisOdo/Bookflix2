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
        $this->middleware('auth:admin');
    }

    public function index(){
      $editoriales=Editorial::orderBy('created_at','DESC')->get();
      return view('admin.editorial.index', compact('editoriales'));
    }

    public function success(){
      $editoriales=Editorial::orderBy('created_at','DESC')->get();
      return view('admin.editorial.success', compact('editoriales'));
    }
        
    public function create()
    {
      return view('admin.editorial.create');
    }

    public function store()
    {    
      $data = request()->validate([
        'name' => ['required', 'unique:editorials']    
      ]);
  
      \App\Editorial::create([
        'name' => $data['name'],
      ]);
  
      return redirect('/editorial/success');
  
    }
}

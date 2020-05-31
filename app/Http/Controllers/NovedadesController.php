<?php

namespace App\Http\Controllers;

use App\Novedad;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class NovedadesController extends Controller
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
      $novedades=Novedad::orderBy('created_at','DESC')->get();
      return view('admin.novedad.index', compact('novedades'));
    }

    public function success(){
      return view('admin.novedad.success');
    }

    public function create()
    {
      return view('admin.novedad.create');
    }

    public function edit($id)
    {
      $novedad = Novedad::find($id);
      return view('admin.novedad.edit', compact('novedad'));
    }

    public function show($id)
    {
      $novedad = Novedad::find($id);
      return view('admin.novedad.show', compact('novedad'));
    }

    public function confirm($id){
      $novedad = Novedad::find($id);
      return view('admin.novedad.delete', compact('novedad'));
    }

    public function delete($id)
    {
      $novedad = Novedad::find($id);
      $novedad->delete();
      return redirect("/novedad/deleted");
    }

    public function deleted(){
      return view('admin.novedad.deleted');
    }
  
    public function update($id)
    { 
      $data = request()->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => ['required', 'image'],
      ]);

      $imagePath = request('image')->store('uploads', 'public');
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
      $image->save();

      $novedad = Novedad::find($id);      

      $novedad->update([
        'name' => $data['name'],    
        'description' => $data['description'],
        'image' => $imagePath,
      ]);
      return redirect("/novedad/modified");
    }

    public function modified(){
      return view('admin.novedad.modified');
    }

    public function store(){    
      $data = request()->validate([
        'name' => ['required', 'unique:novedads'],
        'description' => ['required', 'min:30'],
        'image' => ['required', 'image'],
      ]);

      $imagePath = request('image')->store('uploads', 'public');
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1600);
      $image->save();

      \App\Novedad::create([
        'name' => $data['name'],
        'description' => $data['description'],
        'image' => $imagePath,   
      ]);
      
      return redirect('/novedad/success');

    }
}
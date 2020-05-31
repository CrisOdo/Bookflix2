<?php

namespace App\Http\Controllers;

use App\Novedad;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class UserNovedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      $novedades=Novedad::orderBy('created_at','DESC')->get();
      return view('user.novedad.index', compact('novedades'));
    }

    public function show($id)
    {
      $novedad = Novedad::find($id);
      return view('user.novedad.show', compact('novedad'));
    }
}    

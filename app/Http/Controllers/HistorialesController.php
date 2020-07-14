<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Perfil;

class HistorialesController extends Controller
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

    public function index()
    {          
      $usuario = Auth::user();
      $perfil=$usuario->perfilElegido;
      $perfilElegido = Perfil::find($perfil);   
      $historial = $perfilElegido->historial_id;
      $objetoHistorial = Historial::find($historial); 
      $historial = $objetoHistorial->books;       
      $cantidad = $objetoHistorial->cantidad;      

      return view('user.historial.index', compact('historial','cantidad'));
    }   

    public function terminados()
    {          
      $usuario = Auth::user();
      $librosTerminados=$usuario->librosTerminados;   
      $cantidad = count($librosTerminados);      

      return view('user.historial.terminado', compact('librosTerminados','cantidad'));
    } 
}

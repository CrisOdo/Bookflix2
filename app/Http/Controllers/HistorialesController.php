<?php

namespace App\Http\Controllers;

use App\Historial;
use Illuminate\Http\Request;
use App\User;
use Auth;

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
      $miId = Auth::user()->id;
      $user = User::find($miId);
      $historial = Historial::find($user->historial_id);      

      return view('user.historial.index', compact('historial'));
    }   
}

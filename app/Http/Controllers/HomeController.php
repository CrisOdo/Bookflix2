<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Perfil;
use App\Book;
class HomeController extends Controller
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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $libros = Book::inRandomOrder()->limit(6)->get();
        $perfilElegido = Perfil::find($user->perfilElegido);
        return view('home', compact('perfilElegido','libros'));
    }
}

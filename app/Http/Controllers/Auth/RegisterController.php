<?php

namespace App\Http\Controllers\Auth;

use App\Historial;
use App\Favorito;
use App\Perfil;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROF;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255'],
            'titular' => ['required', 'string', 'max:255'],
            'tarjeta' => ['required', 'string', 'min:13','max:18'],
            'ccv' => ['required', 'string', 'max:4', 'min:3'],
            'año' => ['required', 'string', 'max:2', 'gte:20'],
            'mes' => ['required', 'string', 'max:2', 'lt:13', 'gt:5'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $primerHistorial = Historial::create([
            'books' =>[],
            'cantidad' =>0,
        ]);
        $primerFavoritos = Favorito::create([
            'books' =>[],
            'cantidad' =>0,
        ]);
        $primerPerfil = Perfil::create([
            'name' => $data['username'],
            'miPosicion'=>0,
            'historial_id'=>$primerHistorial->id,
            'favoritos_id'=>$primerFavoritos->id,
        ]);
        

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'titular' => $data['titular'],
            'tarjeta' => $data['tarjeta'],
            'ccv' => $data['ccv'],
            'año' => $data['año'],
            'mes' => $data['mes'],
            'librosTerminados' => [],
            'spoilerAlert'=>true,
            'tipo'=>1,
            'perfilesActivos'=>1,            
            'perfilElegido'=>1,
            'perfiles'=>[$primerPerfil],
            'password' => Hash::make($data['password']),
        ]);
    }
}

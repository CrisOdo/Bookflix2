<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
  public function index()
  {
    $miId = Auth::user()->id;
    $perfil = User::find($miId);
    return view('user.perfil.index', compact('perfil'));
  }

  public function edit()
  {
    $miId = Auth::user()->id;
    $perfil = User::find($miId);
    return view('user.perfil.edit', compact('perfil'));
  }

  public function update(){    
    $data = request()->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'username' => ['required', 'string', 'max:255'],
      'titular' => ['required', 'string', 'max:255'],
      'tarjeta' => ['required', 'string', 'min:13','max:18'],
      'ccv' => ['required', 'string', 'max:4', 'min:3'],
      'año' => ['required', 'string', 'max:2'],
      'mes' => ['required', 'string', 'max:2'],
    ]);    
   
    $user = Auth::user();
    $user->update($data);
    return redirect("/profile/show");
  }
}

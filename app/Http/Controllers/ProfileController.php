<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $miId=Auth::user()->id;
        $perfil=User::find($miId);
        return view('user.perfil.index', compact('perfil'));
      }
}

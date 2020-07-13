<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Historial;
use App\Favorito;
use App\Perfil;

class PerfilController extends Controller
{
  public function index()
  {
    $miId = Auth::user()->id;
    $usuario = User::find($miId);
    $perfiles = $usuario->perfiles;
    return view('user.perfiles.index', compact('perfiles', 'usuario'));
  }

  public function choose()
  {
    $miId = Auth::user()->id;
    $usuario = User::find($miId);
    $perfiles = $usuario->perfiles;
    return view('user.perfiles.choose', compact('perfiles'));
  }

  public function create()
  {
    return view('user.perfiles.create');
  }

  public function newPerfil()
  {
    $data = request();
    $usuario = Auth::user();

    $historial = Historial::create([
      'books' => [],
      'cantidad' => 0,
    ]);
    $favoritos = Favorito::create([
      'books' => [],
      'cantidad' => 0,
    ]);
    $perfil = Perfil::create([
      'name' => $data['name'],
      'miPosicion' => $usuario->perfilesActivos,
      'historial_id' => $historial->id,
      'favoritos_id' => $favoritos->id,
    ]);


    $perfiles = $usuario->perfiles;
    $perfilesActivos = $usuario->perfilesActivos;
    $perfiles[$perfilesActivos] =  $perfil;
    $perfilesActivos = $perfilesActivos + 1;

    $usuario->update([
      'perfiles' => $perfiles,
      'perfilesActivos' => $perfilesActivos,
    ]);

    return view('user.perfiles.index', compact('perfiles', 'usuario'));
  }

  public function marcarPerfilElegido()
  {
    $data = request()->validate([
      'perfilElegido' => ['required'],
    ]);

    $perfilElegido = Perfil::find($data['perfilElegido']);

    $user = Auth::user();
    $user->update($data);
    return view('home', compact('perfilElegido'));
  }

  public function confirmDesactivar()
  {
    $user = Auth::user();
    
    if ($user->perfilesActivos > 1) {
      $perfilElegido = Perfil::find($user->perfilElegido);
      return view('user.perfiles.delete', compact('perfilElegido'));
    } else {
      return view('user.perfiles.deleteFailed');
    }
  }

  public function desactivar($id)
  {
    $usuario = Auth::user();    
    $listaPerfiles = $usuario->perfiles;
    $elPerfil = Perfil::find($id);    

    $historial = $elPerfil->historial_id;
    $elHistorial = Historial::find($historial);

    $favorito = $elPerfil->favoritos_id;
    $elFavorito = Favorito::find($favorito);

    $perfilesActivos = $usuario->perfilesActivos;
  
    unset($listaPerfiles[$elPerfil->miPosicion]);
    
    $perfilesActivos = $perfilesActivos - 1;

    for ($i=$elPerfil->miPosicion +1; $i <= count($listaPerfiles) ; $i++) { 
      ($listaPerfiles[$i]['miPosicion'] = $listaPerfiles[$i]['miPosicion']-1);
      $perfilQueSeActualiza = Perfil::find($listaPerfiles[$i]['id']);
      

      $perfilQueSeActualiza->update([
        'miPosicion' => $listaPerfiles[$i]['miPosicion'],
      ]);
    }

    $listaPerfiles = array_values($listaPerfiles);

    $usuario->update([
      'perfiles' => $listaPerfiles,
      'perfilesActivos' => $perfilesActivos,
      'perfilElegido' => 1,
    ]);
    
    $elHistorial->delete();
    $elFavorito->delete();
    $elPerfil->delete();
    return view('user.perfiles.deleted', compact('listaPerfiles','usuario'));
  }

  public function deleted()
  {
    return view('user.perfiles.deleted');
  }

  public function confirmPremium()
  {
    $usuario = Auth::user();    
    return view('user.perfiles.confirmPremium',compact('usuario'));
  }

  public function premium($id)
  {
    $usuario = Auth::user(); 
    $usuario->update([
      'tipo' => 2,
    ]);   

    return view('user.perfiles.success');
  }

  public function confirmBase()
  {
    $usuario = Auth::user();

    if ($usuario->perfilesActivos > 2) {
      return view('user.perfiles.paseBaseFailed', compact('usuario'));
    } else {
      return view('user.perfiles.confirmBase',compact('usuario'));
    }    
  }

  public function base($id)
  {
    $usuario = Auth::user(); 
    $usuario->update([
      'tipo' => 1,
    ]);   

    return view('user.perfiles.baseSuccess');
  }

}

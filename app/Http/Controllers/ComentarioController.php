<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Illuminate\Support\Facades\Redirect;
use App\Comentario;

class ComentarioController extends Controller
{
    public function store($id){    
        $userID = Auth::user()->id;    
        $data=request();
        $spoiler=false;
        
        if ($data['spoiler'] != null) {
            $spoiler=true;
        }
        
        $data = request()->validate([
          'comentario' => ['required'],
        ]);            
        
        $nuevoComentario = \App\Comentario::create([
          'cuerpo' => $data['comentario'],
          'spoiler' => $spoiler,
          'user_id' => $userID,
          'book_id' => $id,
        ]);

        $libro = Book::find($id);
        $comentarios = $libro->comentarios;
        $cantidad = $libro->cantidadComentarios;
        $comentarios[$cantidad] =  $nuevoComentario;
    
        $nuevoComentario->update([
          'miPosicion' => $cantidad,
        ]);
    
        $cantidad = $cantidad + 1;
        $libro->update([
          'comentarios' => $comentarios,
          'cantidadComentarios' => $cantidad,
        ]);

        
        return Redirect::back();  
      }

      public function delete($id)
      {
        
        $comentario = Comentario::find($id);
    
        $idLibro = $comentario->book_id;
        $libro = Book::find($idLibro);
        

        $listado = $libro->comentarios;
        $cantidad = $libro->cantidadComentarios;
        unset($listado[$comentario->miPosicion]);
        $cantidad = $cantidad - 1;
    
    
        for ($i=$comentario->miPosicion +1; $i <= count($listado) ; $i++) { 
          ($listado[$i]['miPosicion'] = $listado[$i]['miPosicion']-1);
          $comentarioAActualizar = Comentario::find($listado[$i]['id']);
    
          $comentarioAActualizar->update([
            'miPosicion' => $listado[$i]['miPosicion'],
          ]);
        }
    
        $listado = array_values($listado);
    
    
        $libro->update([
          'comentarios' => $listado,
          'cantidadComentarios' => $cantidad,
        ]);
    
        $comentario->delete();
    
        return Redirect::back();
      }
}

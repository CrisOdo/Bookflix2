<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;

class ReportesController extends Controller
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

    public function reporteSuscripciones()
    {
        return view('admin.reportes.find');
    }

    public function reporteMenosLeido()
    {
        $libros = Book::orderBy('vecesTerminado', 'ASC')->get();  
        
        $cantidad=count($libros);

        return view('admin.reportes.indexML',compact('libros','cantidad'));
    }


    public function generarReporteSuscipciones()
    {
        $data = request()->validate([
            'desde' => ['required'],
            'hasta' => ['required'],
        ]);

        $from = $data['desde'];;
        $to = $data['hasta'];;

        $lista=User::whereBetween('created_at', [$from, $to])->get();     
        
        $cantidad=count($lista);

        return view('admin.reportes.index',compact('lista','cantidad'));
    }
}

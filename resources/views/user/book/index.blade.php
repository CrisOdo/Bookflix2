@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de libros</div>
            <div class="row pt-1">

                
               
                
                @foreach ($libros as $libro)
                @if ( ($libro->validoDesde <= date('Y-m-d')) and ($libro->validoHasta >= date('Y-m-d')))
                <div class="col-4 pt-4 pb-4">
                    <h6>{{$libro->name}}</h3>
                        <a href="/book/detalle/{{$libro->id}}">
                            <img src="/storage/{{$libro->image}}" class="w-100">
                        </a>
                </div>
                @endif
                @endforeach
                
            </div>
        </div>
    </div>
    @endsection
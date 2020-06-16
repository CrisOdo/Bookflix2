@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div  class="col-12 pt-4 pb-4">
        <h1 class="col-12 display-4 text-center">Suscribite a Bookflix y difrutá de los mejores títulos</h1>
            <div class="row pt-1">
                @foreach ($libros as $libro)
                @if ( ($libro->validoDesde <= date('Y-m-d')) and ($libro->validoHasta >= date('Y-m-d')))
                    <div class="col-2 pt-4 pb-4">
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
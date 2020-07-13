@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de libros favoritos</div>

                <div class="card-body">
                    <div class="row pt-1">
                        @if ($cantidad == 0)
                        <h4>Aún no tienes libros marcados como Favorito</h4>
                        @else
                       
                        @foreach ( array_reverse($lista)  as $fav)
                        <div class="col-4 ">
                            <p style="font-size:12px">{{$fav['name']}}</p>
                                <a href="/book/detalle/{{$fav['id']}}">
                                    <img src="/storage/{{$fav['image']}}" class="w-25">
                                </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
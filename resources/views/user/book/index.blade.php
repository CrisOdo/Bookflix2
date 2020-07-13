@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($user->spoilerAlert==false)
            <form action="/ASA/{{$user->id}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <div>
                        <button style="margin-left: 15px; font-size: 9px;" type="submit" class="btn btn-primary">
                            Activar spoiler alert
                        </button>
                    </div>
                </div>
            </form>
            @else
            <form action="/DSA/{{$user->id}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <div>
                        <button style="margin-left: 15px; font-size: 9px;" type="submit" class="btn btn-primary">
                            Desactivar spoiler alert
                        </button>
                    </div>
                </div>
            </form>
            @endif

            <div class="card-header">Listado de libros</div>
            <div class="row pt-1">
                @foreach ($libros as $libro)
                @if ( ($libro->validoDesde <= date('Y-m-d')) and ($libro->validoHasta >= date('Y-m-d')))
                    <div class="col-4 pt-4 pb-4">
                        <div class="container">{{$libro->name}}</div>
                        <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet" />
                        <div class="container"> 
                            @php                         
                                $ok=true;
                            @endphp
                            @for ($i = 0; $i < $cantidad; $i++)
                                @if ($libro->id == $lista[$i]['id'])
                                    @php                         
                                        $ok=false;
                                    @endphp
                                @endif
                            @endfor
                            
                            @if($ok == true)
                                <a href="/marcarFavorito/{{$libro->id}}"><i class="fas fa-heart"></i></a>
                            @else
                                <a href="/desmarcarFavorito/{{$libro->id}}"><i class="fas fa-heart-broken"></i></a>
                            @endif

                            <a href="/book/detalle/{{$libro->id}}">
                                <img src="/storage/{{$libro->image}}" class="w-100">
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
            </div>
        </div>
    </div>
    @endsection
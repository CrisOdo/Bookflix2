@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estás utilizando el perfil --> <strong>{{$perfilElegido->name}}</strong>!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::user()->tipo == 1)
                    <div>
                        <a style="text-align: center;" href="/pasatePremium">
                            <h3>Pasate a PREMIUM!</h3>
                        </a>
                    </div>
                    @endif
                </div>
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
    </div>
</div>
@endsection
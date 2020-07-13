@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Volver a abono básico</div>
                <div class="card-body">
                    <form method="POST" action="/pasateBase/{{$usuario->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div>
                            <h4>Al volver al abono básico perderá la posibilidad de contar con 4 perfiles y solo podrá utilizar 2<h4>
                            <p style="font-size: 12px;">Al confirmar la suscripción al abono BASE se cobrarán de su tarjeta el precio del mismo</p>
                        </div>
                        <div class="col-md-6 offset-md-4 d-inline">
                            <button type="submit" class="btn btn-primary">
                                Confirmar
                            </button>
                            <a href="/home">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
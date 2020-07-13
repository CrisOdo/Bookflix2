@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de suscripciones entre las fechas solicitadas</div>
            <div class="row pt-1">
                <h3 style="margin-left: 20px;">Total de suscripciones: {{$cantidad}} </h3>
                @foreach ($lista as $user)
                <div class="col-md-8">
                    <h6 style="margin-left: 20px;">{{$user->email}}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    @endsection
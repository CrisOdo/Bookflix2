@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Género agregado!</div>
            <div class="row pt-1">
                @foreach ($generos as $genero)
                <div class="col-4 pt-4 pb-4">
                    <h3>{{$genero->name}}</h3>                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
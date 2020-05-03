@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Autor agregado!</div>
            <div class="row pt-1">
                @foreach ($autores as $autor)
                <div class="col-4 pt-4 pb-4">
                    <h3>{{$autor->name}}</h3>                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
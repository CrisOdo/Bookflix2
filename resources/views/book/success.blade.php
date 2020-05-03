@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Libro agregado!</div>
            <div class="row pt-1">
                @foreach ($libros as $libro)
                <div class="col-4 pt-4 pb-4">
                    <h6>{{$libro->name}}</h3>
                    <img src="/storage/{{$libro->image}}" class="w-100">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
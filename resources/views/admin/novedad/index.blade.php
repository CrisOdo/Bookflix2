@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de novedades</div>
            <div class="row pt-1">
                @foreach ($novedades as $novedad)
                <div class="col-4 pt-4 pb-4">
                    <h6>{{$novedad->name}}</h3>
                    <img src="/storage/{{$novedad->image}}" class="w-100">
                    <button>
                        <a href="/novedad/show/{{$novedad->id}}">Ver detalle novedad</a> 
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
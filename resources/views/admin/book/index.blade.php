@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de libros</div>
            <div class="row pt-1">
                @foreach ($libros as $libro)
                <div class="col-4 pt-4 pb-4">
                    <h6>{{$libro->name}}</h3>
                        <img src="/storage/{{$libro->image}}" class="w-100">
                        @if ($libro->cantidad==0)
                        <button>
                            <a href="/book/editE/{{$libro->id}}">Editar libro</a>
                        </button>
                        @else
                        <button>
                            <a href="/book/editC/{{$libro->id}}">Editar libro</a>
                        </button>
                        @endif
                        @if($libro->adelanto != null)
                        <button>
                            <a href="/book/deleteAdelanto/{{$libro->id}}">Eliminar adelanto</a>
                        </button>
                        @endif
                        <button>
                            <a href="/book/deleteConfirm/{{$libro->id}}">Eliminar libro</a>
                        </button>                        
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
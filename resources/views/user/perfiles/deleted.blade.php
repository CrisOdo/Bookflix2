@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="col-md-8">
                    <div class="card-header">Perfil desactivado</div>
                </div>
                <div class="card-header d-flex">
                    <h1 class="col-12 display-4 text-center">Selecciona tu perfil</h1>
                </div>

                <div class="card-body">
                    @if($usuario->tipo == 1)
                    @if($usuario->perfilesActivos < 2) <a href="/perfil/create">
                        <div class="text-center col-3 button btn-primary">Nuevo perfil</div>
                        </a>
                        @endif
                        @else
                        @if($usuario->perfilesActivos < 4) <a href="/perfil/create">
                            <div class="text-center col-3 button btn-primary">Nuevo perfil</div>
                            </a>
                            @endif
                            @endif
                            @if($usuario->perfilesActivos == 2 && $usuario->tipo == 1)
                            <h3> Pasate a premium para obtener más perfiles</h3>
                            @endif
                            <form action="/cp" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body align-self-auto">
                                    <div class="row pt-1">
                                        <select id="perfilElegido" type="text" class="form-control @error('perfilElegido') is-invalid @enderror" name="perfilElegido" autofocus>>
                                            <option value="">Seleccione su perfil</option>
                                            @foreach ($listaPerfiles as $perfil)
                                            <option value="{{$perfil['id'] }}"> {{ $perfil['name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('perfilElegido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Seleccionar perfil
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

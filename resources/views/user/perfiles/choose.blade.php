@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <h1 class="col-12 display-4 text-center">Selecciona tu perfil</h1>
                </div>

                <div class="card-body">
                    <form action="/cp" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body align-self-auto">
                            <div class="row pt-1">
                                <select id="perfilElegido" type="text" class="form-control @error('perfilElegido') is-invalid @enderror" name="perfilElegido" autofocus>>
                                    <option value="">Seleccione su perfil</option>
                                    @foreach ($perfiles as $perfil)
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
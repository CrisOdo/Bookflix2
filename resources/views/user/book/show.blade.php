@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">{{$libro->name}}</h3>
                <div class="card-body d-flex">
                    <div class="col-4 center">
                        <img src="/storage/{{$libro->image}}" class="w-100">
                        <h4>Autor:</h4>
                        <p>{{$autor->name}}</p>
                        <h4>Genero:</h4>
                        <p>{{$genero->name}}</p>
                        <h4>Editorial:</h4>
                        <p>{{$editorial->name}}</p>
                        @if ($libro->adelanto != null)
                        <div class="col-12">
                            <form action="/book/readAdelanto/{{$libro->id}}" enctype="multipart/form-data" method="GET">
                                @csrf
                                <div class="form-group row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Ver adelanto
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if ($leido == false)
                        <div class="col-4 d-inline ">
                            <form action="/book/leido/{{$libro['id']}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Marcar como leído
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>

                    <div class="col-4 center">
                        <div>
                            <h4>Descripcion: </h4>
                        </div>

                        <div>
                            <p class="text-justify" id="description" type="text" name="description">
                                {{$libro->description}}
                            </p>
                        </div>
                    </div>


                    <div class="col-12">
                        @if ($libro->cantidad == 0)
                        <form action="/book/read/{{$libro->id}}" enctype="multipart/form-data" method="GET">
                            @csrf
                            <div class="form-group row">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        Leer libro
                                    </button>
                                </div>
                            </div>
                        </form>
                        @else
                        @foreach ($libro->chapters as $chapter)
                        <div class="col-4 d-inline ">
                            <p style="font-size:12px">{{$chapter['name']}}</p>

                            <form action="/chapter/read/{{$chapter['id']}}" enctype="multipart/form-data" method="GET">
                                @csrf
                                <div class="form-group row">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Leer capitulo
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div>
                    <div class="col-6">
                        <h3>Comentarios sobre este libro</h3>
                    </div>
                    @if ($leido == true)
                    <div class="col-12">
                        <form action="/comment/{{$libro['id']}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="comentario" class="col-md-4 col-form-label ">Escribe tu comentario</label>

                                <div class="col-md-6">
                                    <input id="comentario" type="text" class="form-control @error('comentario') is-invalid @enderror" name="comentario" value="{{ old('comentario') }}" autocomplete="comentario" autofocus>

                                    @error('comentario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="spoiler" class="col-md-4 col-form-label">Spoiler</label>

                                <div class="col-md-6">
                                    <input id="spoiler" type="checkbox" class="form-control @error('spoiler') is-invalid @enderror" name="spoiler" checked autofocus>

                                    @error('spoiler')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Comentar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                <div>
                    @if ($libro->cantidadComentarios > 0)
                    @foreach ($libro->comentarios as $comentario)
                    <div class="col-6" style="border: solid; margin-left: 20px; margin-top: 10px;">
                        @if ($comentario['spoiler'] == true && $user->spoilerAlert == true && $comentario['user_id'] != $user->id)
                        <h5 style="color: transparent; text-shadow: 0 0 5px rgba(0,0,0,0.5);">{{$comentario['cuerpo']}}</h5>
                        @else
                        <h5>{{$comentario['cuerpo']}}</h5>
                        @endif
                        @if ($comentario['user_id'] == $user->id)
                        <form action="/comment/delete/{{$comentario['id']}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button style="font-size: 8px;" type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                    <br>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
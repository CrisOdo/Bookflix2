@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles de la cuenta</div>

                <div class="card-body">
                    <form method="POST" action="/profile/update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$perfil->name}}" autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$perfil->username}}" autocomplete="username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <h5>Datos de pago</h5>

                        <div class="form-group row">
                            <label for="titular" class="col-md-4 col-form-label text-md-right">Titular</label>

                            <div class="col-md-6">
                                <input id="titular" type="titular" class="form-control @error('titular') is-invalid @enderror" name="titular" value="{{$perfil->titular}}" autocomplete="titular">

                                @error('titular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tarjeta" class="col-md-4 col-form-label text-md-right">Numero de tarjeta</label>

                            <div class="col-md-6">
                                <input id="tarjeta" type="tarjeta" class="form-control @error('tarjeta') is-invalid @enderror" name="tarjeta" value="{{$perfil->tarjeta}}" autocomplete="tarjeta">

                                @error('tarjeta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ccv" class="col-md-4 col-form-label text-md-right">CCV</label>

                            <div class="col-md-2">
                                <input id="ccv" type="ccv" class="form-control @error('ccv') is-invalid @enderror" name="ccv" value="{{$perfil->ccv}}" autocomplete="ccv">

                                @error('ccv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="año" class="col-md-4 col-form-label text-md-right">Año de vencimiento</label>

                            <div class="col-md-2">
                                <input id="año" type="año" class="form-control @error('año') is-invalid @enderror" name="año" value="{{$perfil->año}}" autocomplete="año">

                                @error('año')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mes" class="col-md-4 col-form-label text-md-right">Mes de vencimiento</label>

                            <div class="col-md-2">
                                <input id="mes" type="mes" class="form-control @error('mes') is-invalid @enderror" name="mes" value="{{$perfil->mes}}" autocomplete="mes">

                                @error('mes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
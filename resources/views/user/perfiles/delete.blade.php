@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Desactivar perfil</div>
                <div class="card-body">
                    <form method="POST" action="/perfiles/delete/{{$perfilElegido->id}}" enctype="multipart/form-data">
                            @csrf     
                            @method('DELETE')                       
                            <div class="card-header">¿Está seguro que desea desactivar el perfil {{$perfilElegido->name}} ?</div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
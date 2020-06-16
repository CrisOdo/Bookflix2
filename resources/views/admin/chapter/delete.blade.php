@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Eliminar capitulo</div>
                <div class="card-body">
                    <form method="POST" action="/chapter/delete/{{$capitulo->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div>¿Está seguro que desea eliminar el {{$capitulo->name}} del libro {{$libro->name}}?</div>
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
@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Listado de los libros menos leídos</div>
            <div class="row pt-1">
                <div class="col-md-8">
                    <h3 style="margin-left: 20px;">Libros menos leídos </h3>
                </div>

                @if($cantidad != 0)
                @foreach ($libros as $book)
                <div class="col-md-12">
                    <a href="/book/deleteConfirm/{{$book['id']}}">
                        <h6 style="margin-left: 20px;">{{$book->name}}---><strong>Fue leído {{$book->vecesTerminado}} veces. Haga click para eliminarlo.</strong></h6>
                    </a>

                </div>
                @endforeach
                @else
                <h3 style="margin-left: 20px;">No hay libros en el sistema</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
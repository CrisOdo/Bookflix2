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
            </div>
        </div>
    </div>
</div>
@endsection
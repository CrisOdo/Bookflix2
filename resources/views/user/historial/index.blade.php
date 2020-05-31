@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Historial</div>

                <div class="card-body">
                    <div class="row pt-1">
                        @if ($historial->cantidad == 0)
                        <h4>Historial vacío</h4>
                        @else
                       
                        @foreach ( array_reverse($historial->books)  as $book)
                        <div class="col-4 ">
                            <p style="font-size:12px">{{$book['name']}}</p>
                                <a href="/book/detalle/{{$book['id']}}">
                                    <img src="/storage/{{$book['image']}}" class="w-25">
                                </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
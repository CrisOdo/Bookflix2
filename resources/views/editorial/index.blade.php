@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Editorial agregada!</div>
            <div class="row pt-1">
                @foreach ($editoriales as $editorial)
                <div class="col-4 pt-4 pb-4">
                    <h3>{{$editorial->name}}</h3>                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
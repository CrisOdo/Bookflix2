@extends('layouts.appAdmins')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tablero de ADMIN</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estás logeado como <strong>ADMIN</strong>!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

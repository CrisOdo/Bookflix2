@extends('layouts.appUsers')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estás utilizando el perfil --> <strong>{{$perfilElegido->name}}</strong>!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::user()->tipo == 1)
                    <div>
                        <a style="text-align: center;" href="/pasatePremium">
                            <h3>Pasate a PREMIUM!</h3>
                        </a>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
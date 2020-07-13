@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ingrese las fechas para las cuales desea generar el reporte</div>
                <div class="card-body">
                    <form action="/generarReporteSuscipciones" enctype="multipart/form-data" method="GET">
                        @csrf
                        <div class="form-group row">
                            <label for="desde" class="col-md-4 col-form-label text-md-right">Desde</label>

                            <div class="col-md-6">
                                <input id="desde" type="date" class="form-control @error('desde') is-invalid @enderror" name="desde" value="{{ old('desde') }}" autocomplete="desde" autofocus>

                                @error('desde')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hasta" class="col-md-4 col-form-label text-md-right">Hasta</label>

                            <div class="col-md-6">
                                <input id="hasta" type="date" class="form-control @error('hasta') is-invalid @enderror" name="hasta" value="{{ old('hasta') }}" autocomplete="hasta" autofocus>

                                @error('hasta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Generar reporte
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
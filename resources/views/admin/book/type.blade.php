@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seleccione el tipo de libro que quiere dar de alta</div>
                <div class="card-body">
                    <form action="/t" enctype="multipart/form-data" method="GET">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="type_id" class="col-md-4 col-form-label text-md-right">Tipo</label>
                            <div class="col-md-6">
                                <select id="type_id" type="text" class="form-control @error('type_id') is-invalid @enderror" name="type_id" value="{{ old('type_id') }}" autocomplete="type_id" autofocus>>
                                    <option value="">Selección</option>                                    
                                    <option value=1>Entero</option>
                                    <option value=2>Por capítulo</option>                                    
                                </select>

                                @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Seleccionar
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
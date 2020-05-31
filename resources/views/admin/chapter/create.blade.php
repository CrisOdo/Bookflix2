@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingrese los datos del nuevo capitulo') }}</div>
                <div class="card-body">
                    <form action="/c" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Titulo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_id" class="col-md-4 col-form-label text-md-right">Libro</label>
                            <div class="col-md-6">
                                <select id="book_id" type="text" class="form-control @error('book_id') is-invalid @enderror" name="book_id" value="{{ old('book_id') }}" autocomplete="book_id" autofocus>>
                                    <option value="">Seleccione</option>
                                    @foreach ($books as $book)
                                    <option value="{{$book['id'] }}"> {{ $book['name']}}</option>
                                    @endforeach
                                </select>

                                @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="archivo" class="col-md-4 col-form-label text-md-right">Archivo</label>

                            <div class="col-md-6">
                                <input id="archivo" type="file" class="form-control @error('archivo') is-invalid @enderror" name="archivo" value="{{ old('archivo') }}" autofocus>

                                @error('archivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Dar de alta book
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
@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingrese los datos de un nuevo libro') }}</div>
                <div class="card-body">
                    <form action="/bc" enctype="multipart/form-data" method="POST">
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
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">ISBN</label>

                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" autocomplete="isbn" autofocus>

                                @error('isbn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre_id" class="col-md-4 col-form-label text-md-right">Género</label>

                            <div class="col-md-6">
                                <select id="genre_id" type="text" class="form-control @error('genre_id') is-invalid @enderror" name="genre_id" value="{{ old('genre_id') }}" autocomplete="genre_id" autofocus>>
                                    <option value="">Seleccione género</option>
                                    @foreach ($generos as $genero)
                                    <option value="{{$genero['id'] }}"> {{ $genero['name']}}</option>
                                    @endforeach
                                </select>

                                @error('genre_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_id" class="col-md-4 col-form-label text-md-right">Autor</label>

                            <div class="col-md-6">
                                <select id="author_id" type="text" class="form-control @error('author_id') is-invalid @enderror" name="author_id" value="{{ old('author_id') }}" autocomplete="author_id" autofocus>>
                                    <option value="">Seleccione autor</option>
                                    @foreach ($autores as $autor)
                                    <option value="{{$autor['id'] }}"> {{ $autor['name']}}</option>
                                    @endforeach
                                </select>

                                @error('author_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="editorial_id" class="col-md-4 col-form-label text-md-right">Editorial</label>
                            <div class="col-md-6">
                                <select id="editorial_id" type="text" class="form-control @error('editorial_id') is-invalid @enderror" name="editorial_id" value="{{ old('editorial_id') }}" autocomplete="editorial_id" autofocus>>
                                    <option value="">Seleccione editorial</option>
                                    @foreach ($editoriales as $editorial)
                                    <option value="{{$editorial['id'] }}"> {{ $editorial['name']}}</option>
                                    @endforeach
                                </select>

                                @error('editorial_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="archivo" class="col-md-4 col-form-label text-md-right">Archivo Capitulo 1</label>

                            <div class="col-md-6">
                                <input id="archivo" type="file" class="form-control @error('archivo') is-invalid @enderror" name="archivo" value="{{ old('archivo') }}" autofocus>

                                @error('archivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="disponibleDesde" class="col-md-4 col-form-label text-md-right">Disponible desde</label>

                            <div class="col-md-6">
                                <input id="disponibleDesde" type="date" class="form-control @error('disponibleDesde') is-invalid @enderror" name="disponibleDesde" value="{{ old('disponibleDesde') }}" autocomplete="disponibleDesde" autofocus>

                                @error('disponibleDesde')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Disponible hasta" class="col-md-4 col-form-label text-md-right">Disponible hasta</label>

                            <div class="col-md-6">
                                <input id="disponibleHasta" type="date" class="form-control @error('disponibleHasta') is-invalid @enderror" name="disponibleHasta" value="{{ old('disponibleHasta') }}" autocomplete="disponibleHasta" autofocus>

                                @error('disponibleHasta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="adelanto" class="col-md-4 col-form-label text-md-right">Adelanto</label>

                            <div class="col-md-6">
                                <input id="adelanto" type="file" class="form-control @error('adelanto') is-invalid @enderror" name="adelanto" value="{{ old('adelanto') }}" autofocus>

                                @error('adelanto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Dar de alta libro por capitulos
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
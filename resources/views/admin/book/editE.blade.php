@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifique los datos que desee') }}</div>
                <div class="card-body">
                    <form method="POST" action="/book/updateE/{{$libro->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$libro->description}}" autocomplete="description" autofocus>

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
                                <select id="genre_id" type="text" class="form-control @error('genre_id') is-invalid @enderror" name="genre_id" value="{{$libro->genre}}" autocomplete="genre_id" autofocus>>
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
                                <select id="author_id" type="text" class="form-control @error('author_id') is-invalid @enderror" name="author_id" value="{{$libro->author_id}}" autocomplete="author_id" autofocus>>
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
                                <select id="editorial_id" type="text" class="form-control @error('editorial_id') is-invalid @enderror" name="editorial_id" value="{{$libro->editorial_id}}" autocomplete="editorial_id" autofocus>
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

                        @if ($libro->archivo != null)
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
                        @endif>

                        <div class="form-group row">
                            <label for="disponibleDesde" class="col-md-4 col-form-label text-md-right">Disponible desde</label>

                            <div class="col-md-6">
                                <input id="disponibleDesde" type="date" class="form-control @error('disponibleDesde') is-invalid @enderror" name="disponibleDesde" value="{{$libro->validoDesde}}" autocomplete="disponibleDesde" autofocus>

                                @error('disponibleDesde')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="disponibleHasta" class="col-md-4 col-form-label text-md-right">Disponible hasta</label>

                            <div class="col-md-6">
                                <input id="disponibleHasta" type="date" class="form-control @error('disponibleHasta') is-invalid @enderror" name="disponibleHasta" value="{{$libro->validoHasta}}" autocomplete="disponibleHasta" autofocus>

                                @error('disponibleHasta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
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
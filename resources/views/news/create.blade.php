@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Agregar Novedades</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Agregar Novedades</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('news.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>TITULO DE LA NOTICIA</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Agregar Titulo" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CONTENIDO</label>
                                <textarea class="form-control detail @error('detail') is-invalid @enderror" name="detail" placeholder="Agregar contenido de la noticia.." rows="10">{!! old('detail') !!}</textarea>
                                @error('detail')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> AGREGAR</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> CANCELAR</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
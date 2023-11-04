@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Modificar Noticia</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Modificar Noticia</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('news.update', $news->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>TITULO DE LA NOTICIA</label>
                                <input type="text" name="title" value="{{ old('title', $news->title) }}" placeholder="" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CONTENIDO</label>
                                <textarea class="form-control detail @error('detail') is-invalid @enderror" name="detail" placeholder="" rows="10">{!! old('detail', $news->detail) !!}</textarea>
                                @error('detail')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> ACTUALIZAR</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> CANCELAR</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
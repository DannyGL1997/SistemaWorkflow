@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Nuevo SLA</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Nuevo SLA</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('slas.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>NOMBRE SLA</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>TIEMPO MINIMO (HORAS)</label>
                                <input type="number" name="response" value="{{ old('response') }}" placeholder="" class="form-control @error('response') is-invalid @enderror">

                                @error('response')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>TIEMPO MAXIMO (HORAS)</label>
                                <input type="number" name="resolution" value="{{ old('resolution') }}" placeholder="" class="form-control @error('resolution') is-invalid @enderror">

                                @error('resolution')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>RECORDAR (HORAS)</label>
                                <input type="number" name="warning" value="{{ old('warning') }}" placeholder="" class="form-control @error('warning') is-invalid @enderror">

                                @error('warning')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Nueva Area</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Nueva Area</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>NOMBRE</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>DESCRIPCIÓN</label>
                                <textarea class="form-control address @error('address') is-invalid @enderror" name="address" placeholder="" rows="10">{!! old('address') !!}</textarea>
                                @error('address')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>TELEFONO</label>
                                <input type="phone" name="phone" value="{{ old('phone') }}" placeholder="" class="form-control @error('phone') is-invalid @enderror">

                                @error('phone')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CORREO</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="" class="form-control @error('email') is-invalid @enderror">

                                @error('email')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ANEXO</label>
                                <input type="text" name="pic" value="{{ old('pic') }}" placeholder="" class="form-control @error('pic') is-invalid @enderror">

                                @error('pic')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ENCARGADO</label>
                                <input type="text" name="salesperson" value="{{ old('salesperson') }}" placeholder="" class="form-control @error('salesperson') is-invalid @enderror">

                                @error('salesperson')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>PROYECTO</label>
                                <input type="text" name="product" value="{{ old('product') }}" placeholder="" class="form-control @error('product') is-invalid @enderror">

                                @error('product')
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
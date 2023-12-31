@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nuevo Rol</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i> Nuevo Rol</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>NOMBRE DEL ROL</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder=""
                                class="form-control @error('title') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">PERMISOS</label>
                            
                            @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="check-{{ $permission->id }}">
                                <label class="form-check-label" for="check-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            AGREGAR</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> CANCELAR</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
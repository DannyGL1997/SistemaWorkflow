@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Nuevo Proyecto</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Nuevo Proyecto</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>NOMBRE DEL PROYECTO</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>AREA</label>
                                <select class="form-control select-customer @error('customer_id') is-invalid @enderror" name="customer_id">
                                    <option value="">- SELECCIONAR AREA -</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INICIO</label>
                                <input type="date" name="deliverystart"  class="form-control @error('deliverystart') is-invalid @enderror">

                                @error('deliverystart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>FINALIZACIÓN</label>
                                <input type="date" name="deliveryend"  class="form-control @error('deliveryend') is-invalid @enderror">

                                @error('deliveryend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INICIO DE INSTALACIÓN</label>
                                <input type="date" name="installstart"  class="form-control @error('installstart') is-invalid @enderror">

                                @error('installstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>FINALIZACIÓN DE INSTALACIÓN</label>
                                <input type="date" name="installend"  class="form-control @error('installend') is-invalid @enderror">

                                @error('installend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INICIO DE PRUEBAS</label>
                                <input type="date" name="uatstart"  class="form-control @error('uatstart') is-invalid @enderror">

                                @error('uatstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>FINAL DE PRUEBAS</label>
                                <input type="date" name="uatend"  class="form-control @error('uatend') is-invalid @enderror">

                                @error('uatend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INICIO DE PAGO</label>
                                <input type="date" name="billstart"  class="form-control @error('billstart') is-invalid @enderror">

                                @error('billstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>FINAL DE PAGO</label>
                                <input type="date" name="billdue"  class="form-control @error('billend') is-invalid @enderror">

                                @error('billend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>PERIODO DE GARANTIA (MESES)</label>
                                <input type="number" name="warrantyperiod" value="{{ old('warrantyperiod') }}" class="form-control @error('warrantyperiod') is-invalid @enderror">

                                @error('warrantyperiod')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INICIO DE CONTRATO</label>
                                <input type="date" name="contractstart"  class="form-control @error('contractstart') is-invalid @enderror">

                                @error('contractstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>PERIODO DE CONTRATO (MESES)</label>
                                <input type="number" name="contractperiod" value="{{ old('contractperiod') }}" class="form-control @error('contractyperiod') is-invalid @enderror">

                                @error('contractperiod')
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
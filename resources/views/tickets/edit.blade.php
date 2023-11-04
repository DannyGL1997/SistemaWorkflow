@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Editar Ticket</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Editar ticket</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    @hasanyrole('Admin|Helpdesk')
                                    @livewire('customer-project', ['customerId' => $ticket->customer_id])

                                    @error('customer_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @endhasanyrole

                                    <input type="hidden" name="updated_customer" id="updated_customer" value="{{ $ticket->customer_id }}">
                                    @hasrole('Teknisi')
                                    <div class="form-group">
                                        <label>AREA</label>
                                        <input type="text" name="customer" value="{{ old('customer', $customer->find($ticket->customer_id)->first()->value('name')) }}" class="form-control" readonly>
                                    </div>
                                    @endhasrole
                                    <div class="form-group">
                                        <label>Nº TICKET</label>
                                        <input type="text" name="ticket_no" value="{{ old('ticket_no', $ticket->number) }}" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>FECHA</label>
                                        <input type="date" name="reporteddate" value="{{ old('reporteddate', Carbon\Carbon::parse($ticket->reporteddate)->format('Y-m-d')) }}" class="form-control @error('reporteddate') is-invalid @enderror" @hasrole('Teknisi') readonly @endhasrole>
                                        @error('reporteddate')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>PROBLEMA ENCONTRADO</label>
                                        <input type="text" name="summary" value="{{ old('summary', $ticket->problemsummary) }}" class="form-control" @hasrole('Teknisi') readonly @endhasrole >

                                        @error('summary')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>DETALLE DEL PROBLEMA</label>
                                        <textarea name="detail" cols="30" rows="30" class="form-control" @hasrole('Teknisi') readonly @endhasrole>{{ old('detail', $ticket->problemdetail) }}</textarea>
                                        @error('detail')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @hasanyrole('Admin|Helpdesk')
                                    <div class="form-group">
                                        <label>URGENCIA</label>
                                        <select class="form-control select-sla @error('sla_id') is-invalid @enderror" name="sla_id">
                                            <option value="">- SELECCIONAR SLA -</option>
                                            @foreach ($slas as $sla)
                                                @if ($ticket->sla_id == $sla->id)
                                                    <option value="{{ $sla->id }}" selected>{{ $sla->name }}</option>
                                                @else
                                                    <option value="{{ $sla->id }}">{{ $sla->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('sla_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>ASIGNADO</label>
                                        <select class="form-control select-technician @error('technician_id') is-invalid @enderror" name="technician_id">
                                            <option value="">- TECNICO -</option>
                                            @foreach ($users as $user)
                                                @if ($ticket->assignee == $user->id)
                                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                               
                                            @endforeach
                                        </select>
                                        @error('technician_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    @endhasanyrole

                                    @hasrole('Teknisi')
                                    <div class="form-group">
                                        <label>URGENCIA</label>
                                        <select class="form-control select-sla @error('sla_id') is-invalid @enderror" name="sla_id" readonly>
                                            <option value="">- SELECCIONAR SLA -</option>
                                            @foreach ($slas as $sla)
                                                @if ($ticket->sla_id == $sla->id)
                                                    <option value="{{ $sla->id }}" selected>{{ $sla->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label>ASIGNADO</label>
                                    <select class="form-control select-technician @error('technician_id') is-invalid @enderror" name="technician_id" readonly>
                                        <option value="">- TECNICO -</option>
                                        @foreach ($users as $user)
                                            @if ($ticket->assignee == $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                    </div>
                                    @endhasrole

                                    @hasanyrole('Admin|Teknisi')
                                    <div class="form-group">
                                        <label>RESOLUCIÓN</label>
                                        <textarea name="resolution" cols="30" rows="30" class="form-control">{{ old('resolution', $ticket->resolution) }}</textarea>
                                        @error('resolution')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>ESTADO</label>
                                        <select name="status" id="status" class="form-control select-status @error('status') is-invalid @enderror" >
                                            <option value="">-- ESTADO --</option>
                                            <option value="Asignado" @if ($ticket->status == "Asignado") selected @endif>Asignado</option>
                                            <option value="Pendiente" @if ($ticket->status == "Pendiente") selected @endif>Pendiente</option>
                                            <option value="Terminado" @if ($ticket->status == "Terminado") selected @endif>Terminado</option>
                                        </select>
                                    </div>
                                    @endhasanyrole
                                    @hasrole('Helpdesk')
                                    <input type="hidden" name="status" id="status" value="{{ $ticket->status }}">
                                    @endhasrole
                                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> AGREGAR</button>
                                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> CANCELAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

<script>
    window.addEventListener('customer-updated', event => {
        document.getElementById('updated_customer').value = event.detail.selectedCustomer;
    })
</script>


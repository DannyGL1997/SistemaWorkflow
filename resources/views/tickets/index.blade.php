@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ticket</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-clipboard-list"></i> Tickets</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('tickets.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('tickets.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('tickets.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> NUEVO</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="Buscar...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> BUSCAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">Nº</th>
                                <th scope="col">Nº TICKET</th>
                                <th scope="col">URGENCIA</th>
                                <th scope="col">AREA</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">PROBLEMA</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col" style="width: 15%;text-align: center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $no => $ticket)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($tickets->currentPage()-1) * $tickets->perPage() }}</th>
                                    <td>{{ $ticket->number }}</td>
                                    <td>{{ $ticket->sla->name }}</td>
                                    <td>{{ $ticket->customer->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($ticket->reporteddate)->format('d M Y - H:i') }}</td>
                                    <td>{{ $ticket->problemsummary }}</td>
                                    <td>{{ $ticket->status }}</td>
                                    <td class="text-center">
                                        @can('tickets.edit')
                                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('tickets.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $ticket->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$tickets->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "¿ESTAS SEGURO?",
                text: "QUIERES ELIMINAR ESTOS DATOS!",
                icon: "warning",
                buttons: [
                    'NO',
                    'SI'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {


                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("tickets.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'EXITOSO!',
                                    text: 'DATOS ELIMINADOS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'FALLO!',
                                    text: 'LOS DATOS NO SE PUDIERON ELIMINAR!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop